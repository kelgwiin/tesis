#!/usr/bin/python
__author__ = 'Harold Araujo'
# Script para recopilar los datos necesarios de cada uno de los threads
# de los procesos a monitorear
import argparse
import tempfile
import subprocess
import re
import sys
import getopt
import time
import datetime
import ps_mem
import os
import signal
import csv
import threading
import logging
import argparse
import logging.handlers
import ConfigParser
import errno
import atexit
from collections import defaultdict
pidfile = "/tmp/poller_csv.pid"


def get_pid():
    try:
        pf = file(pidfile, 'r')
        pid = int(pf.read().strip())
        pf.close()
    except IOError:
        pid = None
    except SystemExit:
        pid = None
    return pid


def delpid():
    if get_pid():
        os.remove(pidfile)


def create_pid():
    # Write pidfile
    atexit.register(delpid)  # Make sure pid file is removed if we quit
    file(pidfile, 'w+').write("%s\n" % str(os.getpid()))


def register_pid():
    pid = get_pid()
    if pid:
        message = "pidfile %s already exists. Attempting to kill previous instance and create a new one.! \n"
        sys.stderr.write(message % pidfile)
        try:
            i = 0
            while 1:
                os.kill(pid, signal.SIGTERM)
                time.sleep(0.1)
                i = i + 1
                if i % 10 == 0:
                    os.kill(pid, signal.SIGHUP)
        except OSError, err:
            err = str(err)
            if err.find("No such process") > 0:
                if os.path.exists(pidfile):
                    os.remove(pidfile)
            else:
                print str(err)
    create_pid()


# DEFAULTS
class Proceso:
    def __init__(self):
        uname = os.uname()
        if uname[0] == "FreeBSD":
            self.proc = '/compat/linux/proc'
        else:
            self.proc = '/proc'

    def path(self, *args):
        return os.path.join(self.proc, *(str(a) for a in args))

    def open(self, *args):
        try:
            return open(self.path(*args))
        except (IOError, OSError):
            val = sys.exc_info()[1]
            if val.errno == errno.ENOENT or val.errno == errno.EPERM:
                raise LookupError
            raise


# Make a class we can use to capture stdout and sterr in the log
class MyLogger(object):
    def __init__(self, logge, level):
        self.logger = logge
        self.level = level

    def write(self, message):
        # Only log if there is a message (not just a new line)
        if message.rstrip() != "":
            self.logger.log(self.level, message.rstrip())


class FuncionHilo(threading.Thread):
    def __init__(self, target, *arg):
        self._target = target
        self._args = arg
        threading.Thread.__init__(self)

    def run(self):
        self._target(*self._args)


def buscar_pids(comms):
    """"
    BUSCAR PIDS POR COMANDO DE EJECUCION DE PROCESO
    """
    pid = []
    pid_command = defaultdict(dict)
    for c in comms:
        t = subprocess.Popen(["pgrep", c], stdout=subprocess.PIPE)
        (output, err) = t.communicate()
        p = output.split('\n')
        del p[-1]
        pid += p
        pid_command[c] = p
    return pid, pid_command


def set_exit_handler(func):
    signal.signal(signal.SIGTERM, func)


def on_exit(sig=0, func=sys.exit):
    try:
        print "exit handler triggered"
        func(sig)
    except:
        print "Bug-TypeError-EasterEgg :D"
        sys.exit(0)


def log_filename():
    logname = directorio + "log/" + datetime.date.today().__str__() + ".log"
    return logname


def proc_filename():
    procname = directorio + "stats/" + "proc_" + datetime.date.today().__str__() + ".csv"
    return procname


def sys_filename():
    procname = directorio + "stats/" + "sys_" + datetime.date.today().__str__() + ".csv"
    return procname


def init_log():
    # Configure logging to log to a file, making a new file at midnight and keeping the last 3 day's data
    logger = logging.getLogger(__name__)  # Give the logger a unique name (good practice)
    logger.setLevel(logging.INFO)  # Set the log level to LOG_LEVEL
    # Make a handler that writes to a file, making a new file at midnight and keeping 3 backups
    handler = logging.handlers.TimedRotatingFileHandler(log_filename(), when="midnight", backupCount=3)
    formatter = logging.Formatter('%(asctime)s %(levelname)-8s %(message)s')  # Format each log message like this
    handler.setFormatter(formatter)  # Attach the formatter to the handler
    logger.addHandler(handler)  # Attach the handler to the logger
    sys.stdout = MyLogger(logger, logging.INFO)  # Replace stdout with logging to file at INFO level
    sys.stderr = MyLogger(logger, logging.ERROR)  # Replace stderr with logging to file at ERROR level
    return logger


def verificar_dir():
    if os.getuid() != 0:
        print("Este script necesita privilegios de administrador.")
        sys.exit()
    dirs = [proc_filename(), log_filename()]
    for d in dirs:
        if not os.path.exists(os.path.dirname(d)):
            try:
                os.makedirs(os.path.dirname(d))
            except OSError as exc:  # Python >2.5
                if exc.errno == errno.EEXIST and os.path.isdir(d):
                    pass
                else:
                    raise


def mac_interface():
    """"
        MAC ADDRESS PARA LA INTERFACE ESPECIFICADA
    """""
    if interface is not "":
        t = subprocess.Popen(["ifconfig ", interface, " | grep HWaddr"],
                             stdout=subprocess.PIPE, stderr=None, shell=True).communicate()[0]
        p = t.split("     ")
        p2 = p[1].split(" ")
        pin = p2.index("HWaddr") + 1
        return p2[pin]
    else:
        return ""


def escribir_archivo(array, pids_comando):
    if process:
        output = defaultdict(dict)
        for key in pids_comando.iterkeys():
            procesos = "-".join(pids_comando[key])
            nombre = key
            cpu = 0
            memoria = 0
            lectop = 0
            escriop = 0
            ddlect = 0
            ddescri = 0
            ddtotal = 0
            pagerr = 0
            timealive = 0
            mac = mac_interface()
            for pid in pids_comando[key]:
                cpu += array[pid][2]
                memoria += array[pid][3]
                lectop += array[pid][4]
                escriop += array[pid][5]
                ddlect += array[pid][6]
                ddescri += array[pid][7]
                ddtotal += array[pid][8]
                pagerr += array[pid][9]
                if timealive < array[pid][10]:
                    timealive = array[pid][10]
            tot = cpu + memoria + lectop + escriop + ddlect + ddescri + ddtotal + pagerr + timealive
            if tot is 0:
                status = "C"
            else:
                status = "R"
            timestamp = (time.strftime('%Y-%m-%d %H:%M:%S'))
            output[nombre] = ["P", nombre, cpu, memoria, lectop, escriop, ddlect, ddescri, ddtotal, pagerr,
                              timealive, status, timestamp, procesos, mac]
    if out_term:
        file_out = sys.stdout
    else:
        file_out = open(proc_filename(), 'a',)

    with file_out as fi:
        writer = csv.writer(fi, delimiter=',', quotechar='"', quoting=csv.QUOTE_ALL)
        if process:
            for row in output:
                writer.writerow(output[row])
        else:
            for row in array:
                writer.writerow(array[row])


def stat():
    try:
        stat_file = proc.open('stat').read()
        vmstat_file = proc.open('vmstat').read()
        interrupts = re.search(r'intr\s+(\d+)', stat_file).group(1)  # INTERRUPTS
        pagesin = re.search(r'pgpgin\s+(\d+)', vmstat_file).group(1)  # PAGES IN
        pagesout = re.search(r'pgpgout\s+(\d+)', vmstat_file).group(1)  # PAGES OUT
        pswapin = re.search(r'pswpin\s+(\d+)', vmstat_file).group(1)  # SWAP IN
        pswapout = re.search(r'pswpout\s+(\d+)', vmstat_file).group(1)  # SWAP OUT
        datos = [float(pagesin), float(pagesout), float(interrupts), float(pswapin), float(pswapout)]
    except KeyError or LookupError:
        array[p] = [0, 0, 0, 0, 0]
    else:
        return datos


def buscar_totales():
    """"
        TOTALES DE SISTEMA EN EL MOMENTO DEL MUESTREO
    """
    meminfo_file = proc.open('meminfo').read()
    uptime_file = proc.open('uptime').readline().split()
    total_memory = re.search(r'^MemTotal:\s+(\d+)', meminfo_file).group(1)
    uptime = float(uptime_file[0])
    idletime = float(uptime_file[1])
    return uptime, idletime, float(total_memory)


def datos_proceso(p, stat_antes, stat_despues, io_antes, io_despues, memoria):
    """
    TASAS DE CPU Y MEMORIA PARA UN PROCESO
    """
    totales = buscar_totales()
    #interface = "eth0"
    #mac_address = subprocess.Popen(['ifconfig', interface], stdout=subprocess.PIPE)
    #mac_address, error = mac_address.communicate()
    #mac_address = re.search(r'HWaddr\s+(.*).\s+\n', mac_address).group(1)
    timestamp = (time.strftime('%Y-%m-%d %H:%M:%S'))
    tiempo_cpu = stat_despues[5] + stat_despues[6]  # Falta decidir si agarrar el tiempo de los hijos
    segundos = totales[0] - (stat_despues[10] / Hertz)
    tasa_cpu = 100 * ((tiempo_cpu / Hertz) / segundos)
    tasa_memoria = 100 * (memoria / totales[2])
    tasa_dd_lectura = (io_despues[2] - io_antes[2]) / 1024  # Expresado en KB
    tasa_dd_escritura = ((io_despues[3] - io_despues[4]) - (io_antes[3] - io_antes[4])) / 1024  # escritos - cancelados
    operaciones_dd_lectura = io_despues[0] - io_antes[0]
    operaciones_dd_escritura = io_despues[1] - io_antes[1]
    errores_pagina = (stat_despues[1] + stat_despues[3]) - (stat_antes[1] + stat_antes[3])
    linea = [p, stat_despues[12].strip('()'), tasa_cpu, tasa_memoria, operaciones_dd_lectura, operaciones_dd_escritura,
             tasa_dd_lectura, tasa_dd_escritura, tasa_dd_escritura + tasa_dd_lectura, errores_pagina, segundos,
             stat_despues[0], timestamp, "T"]
    return linea


def pid_io(p, array):
    """"
    DATOS DE IO POR PROCESO
    """
    try:
        regex_cifras = re.compile('([0-9]+)')
        antes = time.time() - startTime
        output = proc.open(p, 'io').read()
        cifras = regex_cifras.findall(output)
        datos = [float(cifras[2]), float(cifras[3]), float(cifras[4]), float(cifras[5]), float(cifras[6])]
        #(2)operaciones lectura, (3)operaciones escritura, (4)bytes leidos, (5)bytes escritos,
        #(6)bytes escritos cancelados
        array[p] = datos
        despues = time.time() - antes - startTime
        if tiempos:
            print "pid_io: %f" % despues
    except KeyError or LookupError:
        array[p] = [0, 0, 0, 0, 0]
    else:
        return array


def pid_stat(p, array):
    """"
        DATOS GENERALES CPU, PAGINADO, ESTATUS Y MEMORIA VIRTUAL POR PROCESO
    """
    try:
        antes = time.time() - startTime
        cifras = proc.open(p, 'stat').readline().split()
        datos = [cifras[2], float(cifras[9]), float(cifras[10]), float(cifras[11]), float(cifras[12]),
                 float(cifras[13]), float(cifras[14]), float(cifras[15]), float(cifras[16]), float(cifras[19]),
                 float(cifras[21]), float(cifras[22]), cifras[1], int(cifras[4])]
        #(2) Estatus: R running, S sleeping in an interruptible wait, D is waiting in uninterruptible disk sleep,
        #             Z zombie, T is traced or stopped (on a signal) and W is paging.
        #(9)fallas menores pagina, (10)fallas menores pagina hijos
        #(11)fallas mayores pagina, (12)fallas mayores pagina hijos
        #(13)tiempo usuario, (14)tiempo sistema, (15)tiempo usuario hijos, (16)tiempo sistema hijos,
        #(19)numero hilos, (21)tiempo inicio, (22) memoria virtual, (1) nombre de comando
        array[p] = datos
        despues = time.time() - antes - startTime
        if tiempos:
            print "pid_stat: %f" % despues
    except KeyError or LookupError:
        array[p] = ["C", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""]
    else:
        return array


def pid_mem(p, array):
    """"
    MEMORIA USADA POR PROCESO
    """
    try:
        if use_ps_mem:
            antes = time.time() - startTime
            datos = ps_mem.get_memory_usage([float(p)], False)
            array[p] = datos[3]  # Total RAM
            despues = time.time() - antes - startTime
            if tiempos:
                print "pid_mem: %f" % despues
        else:
            lectura = proc.open(p, 'statm').readline().split()
            rss = (int(lectura[1]) * PAGESIZE)
            shared = (int(lectura[2]) * PAGESIZE)
            private = rss - shared
            array[p] = private + shared
    except KeyError or RuntimeError or LookupError:
        array[p] = 0
    else:
        return array


def muestreo(pid_s, array_io, array_pstat):
    for p in pid_s:
        io = FuncionHilo(pid_io, p, array_io)
        pstat = FuncionHilo(pid_stat, p, array_pstat)
        io.start()
        pstat.start()
        io.join()
        pstat.join()


def muestreo_mem(p_ids, memorias):
    for p in p_ids:
        memt = FuncionHilo(pid_mem, p, memorias)
        memt.start()
        memt.join()


def principal():
    # Bucar pids por comando
    pids, pids_comando = buscar_pids(commands)
    principal_starttime = time.time()
    io_before = defaultdict(dict)
    io_after = defaultdict(dict)
    pstat_before = defaultdict(dict)
    pstat_after = defaultdict(dict)
    datos = defaultdict(dict)
    mem = defaultdict(dict)
    muestreo(pids, io_before, pstat_before)  # ANTES
    delay_primer_muestreo = time.time() - principal_starttime
    ajuste_delay = 1 - delay_primer_muestreo
    time.sleep(ajuste_delay)
    muestreo(pids, io_after, pstat_after)  # DESPUES
    if tiempos:
        delay_segundo_muestreo = time.time() - principal_starttime - delay_primer_muestreo - ajuste_delay
        print "Tiempo de Ajuste Automatico: %f" % ajuste_delay
        print "Tiempo de Primer Muestreo: %f" % delay_primer_muestreo
        print "Tiempo de Segundo Muestreo: %f" % delay_segundo_muestreo
    muestreo_mem(pids, mem)
    for p in pids:
        datos[p] = datos_proceso(p, pstat_before[p], pstat_after[p], io_before[p], io_after[p], mem[p])
    escribir_archivo(datos, pids_comando)
    delay_completo = time.time() - principal_starttime
    return delay_completo


def args_parser():
    global args
    parser = argparse.ArgumentParser()
    parser.add_argument('-ps', '--use-ps-mem', action='store_true',
                        help="Use psmem module to calculate memory usage " +
                        "per thread(includes used memory by shared " +
                        "libraries). Uses more system resources!")
    parser.add_argument('-o', '--out-term', action='store_true',
                        help="Print output to stout instead of local file." +
                             " Useful for remote polling.")
    parser.add_argument('-s', '--single-pass', action='store_true',
                        help="Polls processes only one time. " +
                             "Overrides the -i option.")
    parser.add_argument('-p', '--process', action='store_true',
                        help="Outputs the sum of threads per process.")
    parser.add_argument('-i', '--interval', default=5,
                        help="Interval between polls in seconds. " +
                             "Default set to 5 seconds.")
    parser.add_argument('-c', '--commands', default="null",
                        help="Processes names(system command) " +
                             "separated by commas(,)")
    parser.add_argument('-iface', '--interface', default="eth0",
                        help="Interface used in the work/home network.")
    args = parser.parse_args()


def read_config():
    global commands
    global use_ps_mem
    global tiempos
    global startTime
    global proc
    global Hertz
    global PAGESIZE
    global directorio
    global out_term
    global single_pass
    global process
    global count
    global iterate
    global interval
    global interface

    startTime = time.time()
    proc = Proceso()
    Hertz = os.sysconf(os.sysconf_names['SC_CLK_TCK'])
    PAGESIZE = os.sysconf("SC_PAGE_SIZE") / 1024  #
    directorio = ""
    out_term = single_pass = False
    process = True
    count = 1
    interval = 5
    iterate = True
    interface = "eth0"

    if args.commands != "null":
        commands = args.commands.split(',')
        use_ps_mem = args.use_ps_mem
        out_term = args.out_term
        single_pass = args.single_pass
        process = args.process
        interval = args.interval
        interface = args.interface
        tiempos = False
    else:
        try:
            with open('config') as f:
                configParser = ConfigParser.RawConfigParser()
                configParser.read(r'config')
                tiempos = configParser.get('variables', 'logtime') is True
                directorio = configParser.get('variables', 'storepath')
                if 'commands' not in globals():
                    commands = configParser.get('variables', 'commands').split(",")
                if 'interval' not in globals():
                    interval = float(configParser.get('variables', 'interval'))
                if 'use_ps_mem' not in globals():
                    use_ps_mem = configParser.get('variables', 'ps_mem') is True
                if 'process' not in globals():
                    process = not configParser.get('variables', 'per_threads')
                if 'directorio' in globals():
                    if directorio is not "":
                        directorio += "poller_csv/"
                if 'interface' in globals():
                    interface = configParser.get('variables', 'interface')
        except IOError:
            raise Exception("No se pudo abrir el archivo de configuracion.")
        except ConfigParser.NoSectionError:
            raise Exception("No se pudieron leer parametros.")


def main():
    args_parser()
    read_config()
    set_exit_handler(on_exit)
    register_pid()
    global iterate
    global count
    if not out_term:
        verificar_dir()
        log = init_log()
        print "Poller_csv.py in Python %s.%s.%s" % (sys.version_info[0],
                                                    sys.version_info[1],
                                                    sys.version_info[2])
    while iterate is True:
        tiempo_transcurrido = principal()
        count += 1
        if not single_pass:
            time.sleep(interval - tiempo_transcurrido)
        if not out_term:
            log.info("Lectura " + str(count))
            print "Leyendo datos..."
            print "Tiempo transcurrido: %f" % tiempo_transcurrido
        iterate = not single_pass


if __name__ == "__main__":
    main()

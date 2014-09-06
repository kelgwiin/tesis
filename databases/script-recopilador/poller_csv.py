#!/usr/bin/env python
__author__ = 'Harold Araujo'
# Script para recopilar los datos necesarios de cada uno de los threads
# de los procesos a monitorear
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
from collections import defaultdict

# DEFAULTS
startTime = time.time()
proc = ps_mem.Proc()
Hertz = os.sysconf(os.sysconf_names['SC_CLK_TCK'])
PAGESIZE = os.sysconf("SC_PAGE_SIZE") / 1024  # KiB

try:
    # Read command line args
    myopts, args = getopt.getopt(sys.argv[1:], "c:o:i:psmem:")
except getopt.GetoptError as e:
    print(str(e))
    print("Usage: %s -c [command1,command2,command3..] -i [secs]" % sys.argv[0])
    print("   -psmem Use psmem module to calculate memory usage per thread ")
    print("   -o Print output to stout instead of file ")
    print("   -i Interval between polls in seconds")
    print("   -c processes names(system command) separated by commas(,) ")
    sys.exit(2)

for o, a in myopts:

    if o == '-c':
        comandos = a.split(',')
    elif o == '-i':
        intervalo = a
    elif o == '-psmem':
        use_ps_mem = False
    elif o == '-o':
        out_term = True

try:
    with open('config') as f:
        configParser = ConfigParser.RawConfigParser()
        configParser.read(r'config')
        tiempos = configParser.get('variables', 'logtiempo') is True
        if 'comandos' not in globals():
            comandos = configParser.get('variables', 'comandos').split(",")
        if 'intervalo' not in globals():
            intervalo = float(configParser.get('variables', 'intervalo'))
        if 'use_ps_mem' not in globals():
            use_ps_mem = configParser.get('variables', 'ps_mem') is True
        if 'directorio' not in globals():
            directorio = configParser.get('variables', 'storepath')
        if directorio is not "":
            directorio += "poller_csv/"


except IOError:
    raise Exception("No se pudo abrir el archivo de configuracion.")
except ConfigParser.NoSectionError:
    raise Exception("No se pudieron leer parametros.")


def set_exit_handler(func):
    signal.signal(signal.SIGTERM, func)


def on_exit(sig, func=sys.exit):
    print "exit handler triggered"
    func(sig)


def log_filename():
    logname = directorio + "log/" + datetime.date.today().__str__() + ".log"
    return logname


def proc_filename():
    procname = directorio + "stats/" + "proc_" + datetime.date.today().__str__() + ".csv"
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
                os.makedirs(os.path.dirname(d))  # CREAR DIRECTORIO SI NO EXISTE
            except OSError as exc:  # Python >2.5
                if exc.errno == errno.EEXIST and os.path.isdir(d):
                    pass
                else:
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


def escribir_archivo(array):
    with open(proc_filename(), 'a',) as fi:
        writer = csv.writer(fi, delimiter=',', quotechar='"', quoting=csv.QUOTE_ALL)
        for row in array:
            writer.writerow(array[row])


def stat():
    stat_file = proc.open('stat').read()
    vmstat_file = proc.open('vmstat').read()
    interrupts = re.search(r'intr\s+(\d+)', stat_file).group(1)  # INTERRUPTS
    pagesin = re.search(r'pgpgin\s+(\d+)', vmstat_file).group(1)  # PAGES IN
    pagesout = re.search(r'pgpgout\s+(\d+)', vmstat_file).group(1)  # PAGES OUT
    pswapin = re.search(r'pswpin\s+(\d+)', vmstat_file).group(1)  # SWAP IN
    pswapout = re.search(r'pswpout\s+(\d+)', vmstat_file).group(1)  # SWAP OUT
    datos = [float(pagesin), float(pagesout), float(interrupts), float(pswapin), float(pswapout)]
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
             stat_despues[0], timestamp]
    return linea


def buscar_pids(comand):
    """"
    BUSCAR PIDS POR COMANDO DE EJECUCION DE PROCESO
    """
    pids = []
    for c in comand:
        t = subprocess.Popen(["pgrep", c], stdout=subprocess.PIPE)
        (output, err) = t.communicate()
        p = output.split('\n')
        del p[-1]
        pids += p
    return pids


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
        return array
    except KeyError or LookupError:
        array[p] = [0, 0, 0, 0, 0]


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
        array[p] = ["", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""]
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
    return array


def muestreo(pids, array_io, array_pstat):
    for p in pids:
        io = FuncionHilo(pid_io, p, array_io)
        pstat = FuncionHilo(pid_stat, p, array_pstat)
        io.start()
        pstat.start()
        io.join()
        pstat.join()


def muestreo_mem(pids, memorias):
    for p in pids:
        memt = FuncionHilo(pid_mem, p, memorias)
        memt.start()
        memt.join()


def principal(comms):
    principal_starttime = time.time()
    pids = buscar_pids(comms)
    io_before = defaultdict(dict)
    io_after = defaultdict(dict)
    pstat_before = defaultdict(dict)
    pstat_after = defaultdict(dict)
    datos = defaultdict(dict)
    #stat_before = defaultdict(dict)
    #stat_after = defaultdict(dict)
    mem = defaultdict(dict)
    muestreo(pids, io_before, pstat_before)  # ANTES
    #stat_before = stat()
    delay_primer_muestreo = time.time() - principal_starttime
    ajuste_delay = 1 - delay_primer_muestreo
    if tiempos:
        print "Tiempo de Ajuste Automatico: %f" % ajuste_delay
    time.sleep(ajuste_delay)
    if tiempos:
        print "Tiempo de Primer Muestreo: %f" % delay_primer_muestreo
    muestreo(pids, io_after, pstat_after)  # DESPUES
    delay_segundo_muestreo = time.time() - principal_starttime - delay_primer_muestreo - ajuste_delay
    if tiempos:
        print "Tiempo de Segundo Muestreo: %f" % delay_segundo_muestreo
    muestreo_mem(pids, mem)
    for p in pids:
        datos[p] = datos_proceso(p, pstat_before[p], pstat_after[p], io_before[p], io_after[p], mem[p])
    escribir_archivo(datos)
    delay_completo = time.time() - principal_starttime
    return delay_completo


if __name__ == "__main__":
    set_exit_handler(on_exit)
    verificar_dir()
    log = init_log()
    count = 1
    while True:
        log.info("Lectura " + str(count))
        print "Leyendo datos..."
        tiempo_transcurrido = principal(comandos)
        print "Tiempo transcurrido: %f" % tiempo_transcurrido
        count += 1
        time.sleep(intervalo - tiempo_transcurrido)
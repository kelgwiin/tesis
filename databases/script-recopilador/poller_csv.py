#!/usr/bin/env python

# Script para recopilar los datos necesarios de cada uno de los threads
# de los procesos a monitorear
""""
NETHOGS:
- tasa red entrada
- tasa red salida

Cambiar saltos de linea por espacios: tr '\n' ','
REGEX:

- para capturar cifras enteras "/([0-9]\w+)(\n)/g"
- sustituir saltos de linea por algun otro separador $1
- para separar lineas en palabras for word in $line; do echo $word; done
"""

import subprocess
import re
import sys
import time
import datetime
import ps_mem
import os
import csv
import threading
import logging
import argparse
import logging.handlers
import ConfigParser
from collections import defaultdict


if os.getuid() != 0:
    print("Este script necesita privilegios de administrador.")
    sys.exit()


# Defaults
file_name = datetime.date.today().__str__()
LOG_FILENAME = "log/" + file_name + ".log"
LOG_LEVEL = logging.INFO  # Could be e.g. "DEBUG" or "WARNING"
__author__ = 'Harold Araujo'
startTime = time.time()
tiempos = True
proc = ps_mem.Proc()
Hertz = os.sysconf(os.sysconf_names['SC_CLK_TCK'])
PAGESIZE = os.sysconf("SC_PAGE_SIZE") / 1024 #KiB
regex_cifras = re.compile('([0-9]+)')
file_dir = "stats/"
pathproc = file_dir + "proc_" + file_name + ".csv"
dirs = [pathproc, LOG_FILENAME]
configParser = ConfigParser.RawConfigParser()
configFilePath = r'config'
configParser.read(configFilePath)


def verificar_dir():
    for d in dirs:
        if not os.path.exists(os.path.dirname(d)):
            try:
                os.makedirs(os.path.dirname(d))  # CREAR DIRECTORIO SI NO EXISTE
            except OSError as exc:  # Python >2.5
                if exc.errno == errno.EEXIST and os.path.isdir(d):
                    pass
                else:
                    raise


verificar_dir()
# Define and parse command line arguments
parser = argparse.ArgumentParser(description="Servicio recopilador de contadores de rendimiento")
parser.add_argument("-l", "--log", help="archivo donde se almacenaran los logs (default '" + LOG_FILENAME + "')")

# If the log file is specified on the command line then override the default
args = parser.parse_args()
if args.log:
    LOG_FILENAME = args.log

# Configure logging to log to a file, making a new file at midnight and keeping the last 3 day's data
# Give the logger a unique name (good practice)
logger = logging.getLogger(__name__)
# Set the log level to LOG_LEVEL
logger.setLevel(LOG_LEVEL)
# Make a handler that writes to a file, making a new file at midnight and keeping 3 backups
handler = logging.handlers.TimedRotatingFileHandler(LOG_FILENAME, when="midnight", backupCount=3)
# Format each log message like this
formatter = logging.Formatter('%(asctime)s %(levelname)-8s %(message)s')
# Attach the formatter to the handler
handler.setFormatter(formatter)
# Attach the handler to the logger
logger.addHandler(handler)


# Make a class we can use to capture stdout and sterr in the log
class MyLogger(object):
    def __init__(self, logge, level):
        """Needs a logger and a logger level."""
        self.logger = logge
        self.level = level

    def write(self, message):
        # Only log if there is a message (not just a new line)
        if message.rstrip() != "":
            self.logger.log(self.level, message.rstrip())


# Replace stdout with logging to file at INFO level
sys.stdout = MyLogger(logger, logging.INFO)
# Replace stderr with logging to file at ERROR level
sys.stderr = MyLogger(logger, logging.ERROR)


class FuncionHilo(threading.Thread):
    def __init__(self, target, *arg):
        self._target = target
        self._args = arg
        threading.Thread.__init__(self)

    def run(self):
        self._target(*self._args)


def escribir_archivo(array):
    with open(pathproc, 'a',) as f:
        writer = csv.writer(f, delimiter=',', quotechar='"', quoting=csv.QUOTE_ALL)
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
        f = subprocess.Popen(["pgrep", c], stdout=subprocess.PIPE)
        (output, err) = f.communicate()
        p = output.split('\n')
        del p[-1]
        pids += p
    return pids


def pid_io(p, array):
    """"
    DATOS DE IO POR PROCESO
    """
    try:
        antes = time.time() - startTime
        output = proc.open(p, 'io').read()
        cifras = regex_cifras.findall(output)
        datos = [float(cifras[2]), float(cifras[3]), float(cifras[4]), float(cifras[5]), float(cifras[6])]
        #(2)operaciones lectura, (3)operaciones escritura, (4)bytes leidos, (5)bytes escritos,
        #(6)bytes escritos cancelados
        array[p] = datos
        despues = time.time() - antes - startTime
        if tiempos:
            print "io tarda %f" % despues
        return array
    except KeyError:
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
                 float(cifras[21]), float(cifras[22]), cifras[1]]
        #(2) Estatus: R running, S sleeping in an interruptible wait, D is waiting in uninterruptible disk sleep,
        #             Z zombie, T is traced or stopped (on a signal) and W is paging.
        #(9)fallas menores pagina, (10)fallas menores pagina hijos
        #(11)fallas mayores pagina, (12)fallas mayores pagina hijos
        #(13)tiempo usuario, (14)tiempo sistema, (15)tiempo usuario hijos, (16)tiempo sistema hijos,
        #(19)numero hilos, (21)tiempo inicio, (22) memoria virtual, (1) nombre de comando
        array[p] = datos
        despues = time.time() - antes - startTime
        if tiempos:
            print "pidstat tarda %f" % despues
    except KeyError:
        array[p] = ["", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, ""]
    return array


def pid_mem(p, array):
    """"
    MEMORIA USADA POR PROCESO
    """
    try:
        if USE_PS_MEM:
            antes = time.time() - startTime
            datos = ps_mem.get_memory_usage([float(p)], False)
            array[p] = datos[3]  # Total RAM
            despues = time.time() - antes - startTime
            if tiempos:
                print "memoria tarda %f" % despues
        else:
            lectura = proc.open(p, 'statm').readline().split()
            rss = (int(lectura[1]) * PAGESIZE)
            shared = (int(lectura[2]) * PAGESIZE)
            private = rss - shared
            array[p] = private + shared
    except KeyError or RuntimeError:
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
        print ajuste_delay
    time.sleep(ajuste_delay)
    if tiempos:
        print delay_primer_muestreo
    muestreo(pids, io_after, pstat_after)  # DESPUES
    delay_segundo_muestreo = time.time() - principal_starttime - delay_primer_muestreo - ajuste_delay
    if tiempos:
        print delay_segundo_muestreo
    muestreo_mem(pids, mem)
    for p in pids:
        datos[p] = datos_proceso(p, pstat_before[p], pstat_after[p], io_before[p], io_after[p], mem[p])
    escribir_archivo(datos)
    delay_completo = time.time() - principal_starttime
    return delay_completo

count = 0
while True:
    comandos = configParser.get('variables', 'comandos').split(",")
    intervalo = float(configParser.get('variables', 'intervalo'))
    USE_PS_MEM = configParser.get('variables', 'ps_mem') is True
    print USE_PS_MEM
    logger.info("Lectura " + str(count))
    print "Leyendo datos..."
    tiempo_transcurrido = principal(comandos)
    print tiempo_transcurrido
    count += 1
    time.sleep(intervalo - tiempo_transcurrido)
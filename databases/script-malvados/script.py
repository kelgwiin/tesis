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
import time
import datetime
import ps_mem
import os
from collections import defaultdict


# at the beginning of the script
startTime = time.time()

proc = ps_mem.Proc()
Hertz = os.sysconf(os.sysconf_names['SC_CLK_TCK'])
command = "chrome"
regex_cifras = re.compile('([0-9]+)')
file_name = str(datetime.datetime.now())
print file_name
file_dir = "stats/"
path = file_dir + file_name


def verificar_csv():
    if not os.path.exists(os.path.dirname(path)):
        try:
            os.makedirs(os.path.dirname(path))  # CREAR DIRECTORIO SI NO EXISTE
            print os.path.dirname(path)
        except OSError as exc:  # Python >2.5
            if exc.errno == errno.EEXIST and os.path.isdir(path):
                pass
            else:
                raise

    if not os.path.exists(path):
        os.open(path, 'w').close()


def stat():
    stat_file = proc.open('stat').read()
    vmstat_file = proc.open('vmstat').read()
    interrupts = re.search(r'intr\s+(\d+)', stat_file).group(1)  # INTERRUPTS
    pagesin = re.search(r'pgpgin\s+(\d+)', vmstat_file).group(1)  # PAGES IN
    pagesout = re.search(r'pgpgout\s+(\d+)', vmstat_file).group(1)  # PAGES OUT
    pswapin = re.search(r'pswpin\s+(\d+)', vmstat_file).group(1)  # SWAP IN
    pswapout = re.search(r'pswpout\s+(\d+)', vmstat_file).group(1)  # SWAP OUT
    datos = [pagesin, pagesout, interrupts, pswapin, pswapout]
    datos = [float(i) for i in datos]
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
    """ifconfig eth0 | grep HWaddr | rev | cut -d' ' -f3 | rev """
    interface = "eth0"
    mac_address = subprocess.Popen(['ifconfig', interface], stdout=subprocess.PIPE)
    mac_address,error = mac_address.communicate()
    mac_address = re.search(r'HWaddr\s+(.*).\s+\n', mac_address).group(1)
    tiempo_cpu = stat_despues[p][5] + stat_despues[p][6]  # Falta decidir si agarrar el tiempo de los hijos
    segundos = totales[0] - (stat_despues[p][10] / Hertz)
    tasa_cpu = 100 * ((tiempo_cpu / Hertz) / segundos)
    tasa_memoria = 100 * (memoria[p] / totales[2])
    tasa_dd_lectura = (io_despues[p][2] - io_antes[p][2]) / 1024  # Expresado en KB
    tasa_dd_escritura = ((io_despues[p][3] - io_despues[p][4]) - (io_antes[p][3] - io_antes[p][4])) / 1024  # escritos - cancelados
    operaciones_dd_lectura = io_despues[p][0] - io_antes[p][0]
    operaciones_escritura = io_despues[p][1] - io_antes[p][1]
    errores_pagina = (stat_despues[p][1] + stat_despues[p][3]) - (stat_antes[p][1] + stat_antes[p][3])
    return int(p), mac_address, stat_despues[p][0], tasa_cpu, tasa_memoria, tasa_dd_lectura, tasa_dd_escritura, \
           operaciones_dd_lectura, operaciones_escritura, errores_pagina


def buscar_pids(comando):
    """"
    BUSCAR PIDS POR COMANDO DE EJECUCION DE PROCESO
    """
    f = subprocess.Popen(["pgrep", comando], stdout=subprocess.PIPE)
    (output, err) = f.communicate()
    pids = output.split('\n')
    del pids[-1]
    return pids


def pid_io(p, array):
    """"
    DATOS DE IO POR PROCESO
    """
    output = proc.open(p, 'io').read()
    cifras = regex_cifras.findall(output)
    datos = [cifras[2], cifras[3], cifras[4], cifras[5], cifras[6]]
    #(2)operaciones lectura, (3)operaciones escritura, (4)bytes leidos, (5)bytes escritos,
    #(6)bytes escritos cancelados
    datos = [float(i) for i in datos]
    array[p] = datos
    return array


def pid_stat(p, array):
    """"
        DATOS GENERALES CPU, PAGINADO, ESTATUS Y MEMORIA VIRTUAL POR PROCESO
    """

    cifras = proc.open(p, 'stat').readline().split()
    datos = [cifras[2], float(cifras[9]), float(cifras[10]), float(cifras[11]), float(cifras[12]), float(cifras[13]), 
             float(cifras[14]), float(cifras[15]), float(cifras[16]), float(cifras[19]), float(cifras[21]), float(cifras[22])]
    #(2) Estatus: R running, S sleeping in an interruptible wait, D is waiting in uninterruptible disk sleep,
    #             Z zombie, T is traced or stopped (on a signal) and W is paging.
    #(9)fallas menores pagina, (10)fallas menores pagina hijos
    #(11)fallas mayores pagina, (12)fallas mayores pagina hijos
    #(13)tiempo usuario, (14)tiempo sistema, (15)tiempo usuario hijos, (16)tiempo sistema hijos,
    #(19)numero hilos, (21)tiempo inicio, (22) memoria virtual
    array[p] = datos
    return array


def pid_mem(p, array):
    """"
    MEMORIA USADA POR PROCESO
    """
    datos = ps_mem.get_memory_usage([float(p)], False)
    array[p] = datos[3]  # Total RAM
    return array


def principal(comandos, ajuste):
    verificar_csv()
    pids = buscar_pids(comandos)
    io_before = defaultdict(dict)
    io_after = defaultdict(dict)
    pstat_before = defaultdict(dict)
    pstat_after = defaultdict(dict)
    stat_before = defaultdict(dict)
    stat_after = defaultdict(dict)
    mem = defaultdict(dict)
    for p in pids:
        io_before = pid_io(p, io_before)
        pstat_before = pid_stat(p, pstat_before)
        mem = pid_mem(p, mem)
    stat_before = stat()
    #print io_before
    #print pstat_before
    primera = time.time() - startTime
    print "Primera muestra tardo %f segundos" % primera
    print "------------------------TIEMPO DE ESPERA 1seg---------------------------"
    time.sleep(ajuste)
    for p in pids:
        io_after = pid_io(p, io_after)
        pstat_after = pid_stat(p, pstat_after)
        print datos_proceso(p, pstat_before, pstat_after, io_before, io_after, mem)
    segunda = (time.time() - startTime - primera)
    print "Segunda muestra tardo %f segundos" % segunda
    stat_after = stat()
    #print io_after
    #print pstat_after
    #print stat_before
    #print stat_after


principal(command, 1)
print "Tardo %f segundos"  % (time.time() - startTime)
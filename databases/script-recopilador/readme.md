poller_csv
==========

A tool for retreaving performance stats for processes in linux, detailing threads, by using the proc filesystem,
outputs results in csv files for later retrieval.

Example output:
---------------

```
"16111","chrome","17.805196393350926","5.983826549153017","7.0","5.0","0.0","0.0","0.0","1.0","16518.379999999997","S","2014-09-06 21:10:05","T"

```
"PID","process(command)","%cpu_usage","%memory_usage","#disk_reads","#disk_writes","%disk_read_rate","%disk_write_rate",
"%disk_total","page_erros","time_alive","status","timestamp","PID list"

PID field could be a "P" value if the per_threads flag is set to False, if not it will print the PID number.
PID list field is the PID numbers of the parent and children processes for the specified command.


Usage as terminal command:
--------------------------

```
poller_csv.py [-psmem -o -s -p] [-c COMMANDS] [-i INTERVAL]

```
* -psmem --use-ps-mem Use psmem module to calculate memory usage per thread(includes used memory by shared libraries). Uses more system resources!
* -o --out-term Print output to stout instead of local file. Useful for remote polling.
* -i --interval Interval between polls in seconds.
* -c --commands processes names(system command) separated by commas(,)
* -s --single-pass Polls processes only one time. **Overrides the -i option**.
* -p --process Outputs the sum of threads per process.


Config file
-----------

Configuration is read by default if not overrided by any of the option described before:

```
[variables]
commands = chrome,apache2
interval = 5
ps_mem = False
logtime = False
storepath = /home/
per_threads = True
interface = eth0

```

* commands: The list of process separated by commas. for this use the default executable name or system command
* interval: The time in seconds between each poll of the tool. Default is 5 secs.
* ps_mem: This flag activates the usage of the module ps_mem for more accurate memory stats(includes used memory by shared libraries).
* logtime: This flag creates a file for logging polling times, issues and exceptions.
* storepath: Defines the path where this module creates a filesystem to store the stats directory(containing the csv per day of polling)
* per_threads: This flags is used for detailing threads in the target csv or to consolidate data per process.
* interface: The network interface connected to the bussiness/home network.

poller_daemon.py:
------------

I created a python script that manages installs, uninstalls and start de poller_csv script as daemon for a painless install/uninstall of script as service.

```
poller_daemon.py {install|uninstall|start|stop|restart|status}

```

* install Install the script to the /usr/bin directory.
* uninstall Deletes the script from the /usr/bin directory and asks for deleting data repository.
* start|stop|restart Self explanatory basic actions for poller_csv script

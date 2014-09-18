poller_csv
==========

A tool for retreaving performance stats for processes in linux, detailing threads, by using the proc filesystem,
outputs results in csv files for later retrieval.

Example output:
---------------

```
"16111","chrome","17.805196393350926","5.983826549153017","7.0","5.0","0.0","0.0","0.0","1.0","16518.379999999997","S","2014-09-06 21:10:05"

```
"PID(Process ID)","process(command)","%cpu_usage","%memory_usage","#disk_reads","#disk_writes","%disk_read_rate","%disk_write_rate",
"%disk_total","page_erros","time_alive","status","timestamp"

Usage as terminal command:
--------------------------

```
poller_csv.py [-psmem -o -s -p] -c [command1,command2,command3..] -i [secs]

```
* -psmem Use psmem module to calculate memory usage per thread. Uses more system resources!
* -o Print output to stout instead of local file. Useful for remote polling.
* -i Interval between polls in seconds.
* -c processes names(system command) separated by commas(,)
* -s Polls processes only one time. **Overrides the -i option**.
* -p Outputs the sum of threads per process.EXPERIMENTAL!


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

```

* commands: The list of process separated by commas. for this use the default executable name or system command
* interval: The time in seconds between each poll of the tool. Default is 5 secs.
* ps_mem: This flag activates the usage of the module ps_mem for more accurate memory stats.
* logtime: This flag creates a file for logging polling times, issues and exceptions.
* storepath: Defines the path where this module creates a filesystem to store the stats directory(containing the csv per day of polling)
* per_threads: EXPERIMENTAL. This flags is used for detailing threads in the target csv or to consolidate data per process.


Bash script:
------------

I created a bash script for a painless install/uninstall of script as service.

```
poller_csv.sh {install|uninstall|start|stop|restart|status}

```

* install Install the script to the init.d directory.
* uninstall Deletes the script from the init.d directory.
* start|stop|restart|status Self explanatory
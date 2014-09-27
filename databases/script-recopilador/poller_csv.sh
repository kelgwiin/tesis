#!/bin/bash

### BEGIN INIT INFO
# Provides:          poller_csv
# Required-Start:    $remote_fs $syslog
# Required-Stop:     $remote_fs $syslog
# Default-Start:     2 3 4 5
# Default-Stop:      0 1 6
# Short-Description: poller_csv daemon
# Description:       Enable service for polling processes and output results in csv.
### END INIT INFO

function install {
   echo -n "Installing poller_csv service..."
   cp poller_csv.sh /etc/init.d/
   update-rc.d poller_csv.sh defaults
   echo "..Done"
   exit 1
}

function uninstall {
   echo -n "Uninstalling poller_csv service..."
   update-rc.d -f  poller_csv.sh remove
   rm /etc/init.d/poller_csv.sh
   echo "..Done"
   exit 1
}
function get_pid {
   IFS=' ' read -a pids <<< $(pidof python ./poller_csv.py)
}

function stop {
   get_pid
   if [ "${#pids[@]}" = 0 ]
   then
      echo "poller_csv service is not running."
   else
      echo -n "Stopping poller_csv service..."
      kill "$pids"
      sleep 1
      echo ".. Done."
   fi
   exit 1
}


function start {
   get_pid
   if [ "${#pids[@]}" = 0 ]
   then
      echo  "Starting poller_csv service..."
      ./poller_csv.py &
      get_pid
      echo "$pids" 1>! ${PIDFILE}
      echo "Done."
   else
      echo "poller_csv service is already running, PIDS: $PID"
   fi
}

function restart {
   echo  "Restarting poller_csv service.."
   get_pid
   if [ "${#pids[@]}" = 0 ]
   then
      start
   else
      stop
      sleep 5
      start
   fi
}

function status {
   get_pid
   if [ "${#pids[@]}" = 0 ]
   then
      echo "poller_csv service is not running."
   else
      echo "poller_csv service is running, PIDS: $pids"
   fi
   exit 1
}

case "$1" in
   start)
      start
   ;;
   stop)
      stop
   ;;
   restart)
      restart
   ;;
   status)
      status
   ;;
   install)
      install
   ;;
   uninstall)
      uninstall
   ;;
   *)
      echo "Usage: $0 {start|stop|restart|status}"
esac

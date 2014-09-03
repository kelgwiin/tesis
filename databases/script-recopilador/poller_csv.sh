#!/bin/bash

cd /var/www/tesis/databases/script-recopilador/

function install {
   echo -n "Installing server..."
   cp poller_csv.sh /etc/init.d/
   echo "..Done"
   exit 1
}

function uninstall {
   echo -n "Uninstalling server..."
   rm /etc/init.d/poller_csv.sh
   echo "..Done"
   exit 1
}
function get_pid {
   IFS=' ' read -a pids <<< $(pidof python poller_csv.py)
}

function stop {
   get_pid
   if [ "${#pids[@]}" = 0 ]
   then
      echo "server is not running."
   else
      echo -n "Stopping server..."
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
      echo  "Starting server..."
      ./poller_csv.py &
      get_pid
      echo "$pids" 1>! ${PIDFILE}
      echo "Done."
   else
      echo "server is already running, PIDS: $PID"
   fi
}

function restart {
   echo  "Restarting server.."
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
      echo "Server is not running."
   else
      echo "Server is running, PIDS: $pids"
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
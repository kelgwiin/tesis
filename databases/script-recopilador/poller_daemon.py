#!/usr/bin/python
__author__ = 'Harold Araujo'
import os
import sys
import shutil
import subprocess
import errno
import dis
import signal
import time
import poller_csv
from crontab import CronTab

poller_dir = "/usr/poller_csv"
stats_dir = "/home/poller_csv"
pidfile = "/tmp/poller_csv.pid"
files = ["/config", "/poller_csv.py", "/readme.md", "/poller_daemon.py"]
cron = "/etc/crontab"
cronjob = "@reboot python %s/poller_daemon.py start &" % poller_dir
poller_script = "%s/poller_csv.py &" % poller_dir
poller_exec = "python %s" % poller_script


def start():
    os.system(poller_exec)
    print "Daemon started."

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


def query_yes_no(question, default="yes"):
    valid = {"yes": True, "y": True, "ye": True,
             "no": False, "n": False}
    if default is None:
        prompt = " [y/n] "
    elif default == "yes":
        prompt = " [Y/n] "
    elif default == "no":
        prompt = " [y/N] "
    else:
        raise ValueError("invalid default answer: '%s'" % default)

    while True:
        sys.stdout.write(question + prompt)
        choice = raw_input().lower()
        if default is not None and choice == '':
            return valid[default]
        elif choice in valid:
            return valid[choice]
        else:
            sys.stdout.write("Please respond with 'yes' or 'no' "
                             "(or 'y' or 'n').\n")


def copy_files(src, dst, file_list):
    for files in file_list:
        src_file_path = src + files
        dst_file_path = dst + files
        if os.path.exists(dst_file_path):
            with open(src_file_path) as f1:
                with open(dst_file_path) as f2:
                    if f1.read() == f2.read():
                        print "%s already exists." % dst_file_path
                        continue
        print "Copying: %s" % dst_file_path
        try:
            shutil.copyfile(src_file_path, dst_file_path)
            fileName, fileExtension = os.path.splitext(
                dst_file_path)
            if fileExtension is ".py":
                os.chmod(dst_file_path, S_IXUSR)
            if fileName is "config":
                os.chmod(dst_file_path, S_IWOTH)
        except IOError:
            print src_file_path + " does not exist"
            raw_input("Please, press enter to continue.")


def read_file(file_name):
        f = open(file_name)
        # reads each line of file (f), strips out extra whitespace and
        # returns list with each line of the file being an element of the list
        content = [x.strip() for x in f.readlines()]
        f.close()
        return content


def create_directory(d):
    if not os.path.exists(d):
        try:
            os.makedirs(d)
        except OSError as exc:  # Python >2.5
            if exc.errno == errno.EEXIST and os.path.isdir(d):
                pass
            else:
                raise


def modify_crontab(case):
    tab = CronTab()
    cron = tab.new(command=poller_exec, comment='POLLER_CSV CRONJOB')
    cron.every_reboot()
    if case is "delete":
        tab.remove(cron)
        print "Cronjob Deleted."
    elif case is "add":
        if not tab.find_command(poller_exec):
            tab.write()
            print "Cronjob created succesfully!."
        else:
            print "Cronjob already exists!."


"""def modify_crontab(case):
    if case is "delete":
        f = open(cron, "r")
        lines = f.readlines()
        f.close()
        f = open(cron, "w")
        for line in lines:
            if cronjob not in line:
                f.write(line)
        f.close()
        print "Cronjob Deleted."
    elif case is "add":
        if not cronjob_exists():
            with open(cron, "a") as myfile:
                myfile.write("%s\n" % cronjob)
            print "Cronjob created succesfully!."
        else:
            print "Cronjob already exists!."
"""


def cronjob_exists():
    f = open(cron, "r")
    lines = f.readlines()
    f.close()
    for line in lines:
        if cronjob in line:
            return True
    return False


def delete_dir():
    try:
        if query_yes_no("You are about to uninstall poller_csv! " +
                        "Are you sure yo want to continue?"):
            shutil.rmtree(poller_dir)
        print "Script files deleted succesfully!."
    except OSError as exc:
        if exc.errno is not errno.EEXIST:
            print "Nothing to delete"
    try:
        if query_yes_no("Do you wish to delete /home/poller_csv as well?"):
            shutil.rmtree(stats_dir)
        print "Stats and log files deleted succesfully!."
    except OSError as exc:
        if exc.errno is not errno.EEXIST:
            print "Nothing to delete"


def try_stop():
    pid = get_pid()
    if not pid:
        message = "pidfile %s does not exist. Poller_Daemon not running!\n"
        sys.stderr.write(message % pidfile)

        if os.path.exists(pidfile):
            os.remove(pidfile)

        return  # Not an error in a restart
    try:
        i = 0
        while 1:
            os.kill(pid, signal.SIGTERM)
            time.sleep(0.1)
            i = i + 1
            if i % 10 == 0:
                os.kill(pid, signal.SIGHUP)
        print "Daemon stopped."
    except OSError, err:
        err = str(err)
        if err.find("No such process") > 0:
            if os.path.exists(pidfile):
                os.remove(pidfile)
        else:
            print str(err)


def check_install(func):
    if not os.path.exists(poller_dir):
        print "poller_csv files not installed!."
    else:
        func()


def main():
    print "Poller_csv.py in Python %s.%s.%s" % (sys.version_info[0],
                                                sys.version_info[1],
                                                sys.version_info[2])
    if len(sys.argv) == 2:
        if 'start' == sys.argv[1]:
            check_install(start)
        elif 'stop' == sys.argv[1]:
            check_install(try_stop)
        elif 'restart' == sys.argv[1]:
            check_install(try_stop)
            check_install(start)
        elif 'install' == sys.argv[1]:
            print "Creating directory and files necessary for the Poller_csv Daemon."
            create_directory(poller_dir)
            copy_files(os.getcwd(), poller_dir, files)
            modify_crontab("add")
        elif 'uninstall' == sys.argv[1]:
            try_stop()
            modify_crontab("delete")
            delete_dir()
            print "Finished"
        else:
            print "Unknown command"
            sys.exit(2)
        sys.exit(0)
    else:
        print "usage: %s start|stop|restart|install|uninstall" % sys.argv[0]
        sys.exit(2)


if __name__ == "__main__":
    main()

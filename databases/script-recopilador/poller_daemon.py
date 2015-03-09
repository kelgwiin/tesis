#!/usr/bin/python
__author__ = 'Harold Araujo'
import os
import sys
import shutil
import subprocess
import errno
import dis
import poller_csv


poller_dir = "/usr/poller_csv"
stats_dir = "/home/poller_csv"
pid_dir = "/tmp/poller_daemon.pid"
poller_pid = "/tmp/poller_csv.pid"
files = ["/config", "/poller_csv.py", "/daemon.py", "/ps_mem.py", "/readme.md",
         "/poller_daemon.py"]
cron = "/etc/crontab"
cronjob = "@reboot python %s/poller_daemon.py start &" % poller_dir
poller_script = "%s/poller_csv.py" % poller_dir
poller_exec = "python %s" % poller_script
proc_child = None


daemon = poller_csv.PollerDaemon(pid_dir)


def query_yes_no(question, default="yes"):
    """Ask a yes/no question via raw_input() and return their answer.

    "question" is a string that is presented to the user.
    "default" is the presumed answer if the user just hits <Enter>.
        It must be "yes" (the default), "no" or None (meaning
        an answer is required of the user).

    The "answer" return value is True for "yes" or False for "no".
    """
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
    if not os.path.exists(pid_dir) and not os.path.exists(poller_pid):
        print "Daemon not running."
    else:
        #proc_child.kill()
        daemon.stop()
        print "Daemon stopped."


def main():
    print "Poller_csv.py in Python %s.%s.%s" % (sys.version_info[0],
                                                sys.version_info[1],
                                                sys.version_info[2])
    if len(sys.argv) == 2:
        if 'start' == sys.argv[1]:
            if not os.path.exists(poller_dir):
                print "poller_csv files not installed!."
            else:
                daemon.start()
                #dis.disassemble(daemon.start())
                print "Daemon started."
        elif 'stop' == sys.argv[1]:
            if not os.path.exists(poller_dir):
                print "poller_csv files not installed!."
            else:
                try_stop()
        elif 'restart' == sys.argv[1]:
            daemon.restart()
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

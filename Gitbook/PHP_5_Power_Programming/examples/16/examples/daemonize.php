<?php

$pid = pcntl_fork();
if ($pid) {
    exit(0);
}

// create new session, detach from shell
posix_setsid();

// XXX if STD{IN,OUT,ERR} constants become available, these have
// to be closed here.

while (true) {
    error_log("heartbeat\n", 3, "/tmp/test.log");
    sleep(10);
}

?>
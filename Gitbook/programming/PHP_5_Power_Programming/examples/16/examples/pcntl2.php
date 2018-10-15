<?php

$child_pid = pcntl_fork();
if ($child_pid == 0) {
    // replace php with "ls" command in child
    pcntl_exec("/bin/ls", array("-la"));
} elseif ($child_pid != -1) {
    // wait for the "ls" process to exit
    pcntl_waitpid($child_pid, $status, 0);
}

?>
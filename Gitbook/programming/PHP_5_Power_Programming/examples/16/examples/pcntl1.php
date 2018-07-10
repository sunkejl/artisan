<?php

$child_pid = pcntl_fork();

if ($child_pid == -1) {
    die("pcntl_fork() failed: $php_errorstr");
} else if ($child_pid) {
    printf("I am the parent, my pid is %d and my child's pid is %d.\n",
           posix_getpid(), $child_pid);
} else {
    printf("I am the child, my pid is %d.\n", posix_getpid());
}

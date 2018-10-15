<?php

function sigint_handler($signo) {
     print "Interrupt!\n";
     exit;
}

pcntl_signal(SIGINT, "sigint_handler");
//pcntl_signal(SIGINT, SIG_IGN);
print "handler set up\n";
declare (ticks = 1) {
    while (true) { sleep(1); }
}


<?php

// signal handler function
function sig_handler($signo) {
                                                                                
     switch($signo) {
         case SIGTERM:
			print "Caught SIGTERM...\n"; flush();
             // handle shutdown tasks
             exit;
             break;
         case SIGHUP:
			print "Caught SIGHUP...\n"; flush();
             // handle restart tasks
             break;
         case SIGUSR1:
			print "Caught SIGUSR1...\n"; flush();
             break;
         default:
             // handle all other signals
     }
                                                                                
}
                                                                                
                                                                                
print "Installing signal handler...\n";
                                                                                
// setup signal handlers
pcntl_signal(SIGTERM, "sig_handler");
pcntl_signal(SIGHUP, "sig_handler");
pcntl_signal(SIGUSR1, "sig_handler");
                                                                                
print "Generating signal SIGTERM to self...\n";
                                                                                
// send SIGUSR1 to current process id
posix_kill(posix_getpid(), SIGTERM);
                                                                                
print "Done\n";


<?php

error_reporting(E_ALL);

require_once "PEAR.php";
require_once "Console/Getopt.php";

$DAEMON = false;
$PORT = 1234;
$MAX_USERS = 50;

$progname = basename($argv[0]);
PEAR::setErrorHandling(PEAR_ERROR_DIE, "$progname: %s\n");

$options = Console_Getopt::getopt($argv, "dp:m:h");

foreach ($options[0] as $opt) {
    switch ($opt[0]) {
        case 'd':
            $DAEMON = true;
            break;
        case 'p':
            $PORT = $opt[1];
            break;
        case 'm':
            $MAX_USERS = $opt[1];
            break;
        case 'h':
        case '?':
            fwrite(STDERR, "Usage: $progname [-dh] [-p port] [-m users]
Options:
    -d        detach into background (daemon mode)
    -p port   set tcp port number
    -m users  set max number of users
    -h        this help message
");
            exit(1);
    }
}

if ($DAEMON) {
    $pid = pcntl_fork();
    if ($pid) {
        exit(0);
    }
    posix_setsid();
}

$sock = socket_create_listen($PORT);
if (!$sock) {
    exit(1);
}

$shutting_down = false;
$connections = array();
$usernames = array();
$input = array();
$output = array();
$close = array();

while (true) {
    $readfds = array_merge($connections, array($sock));
    $writefds = array();
    reset($output);
    while (list($i, $b) = each($output)) {
        if (strlen($b) > 0) {
            $writefds[] = $connections[$i];
        }
    }
    if (socket_select($readfds, $writefds, $e = null, 60)) {
        foreach ($readfds as $rfd) {
            if ($rfd == $sock) {
                $newconn = socket_accept($sock);
                $i = (int)$newconn;
                $reject = '';
                if (count($connections) >= $MAX_USERS) {
                    $reject = "Server full. Try again later.\n";
                } elseif ($shutting_down) {
                    $reject = "Server shutting down.\n";
                }
                $connections[$i] = $newconn;
                $output[$i] = '';
                if ($reject) {
                    output($i, $reject);
                    $close[$i] = true;
                } else {
                    output($i, "Welcome to the PHP Chat Server!\n");
                    output($i, "Username: ");
                }
                $usernames[$i] = "";
                $input[$i] = "";
                continue;
            }
            $i = (int)$rfd;
            $tmp = @socket_read($rfd, 2048, PHP_NORMAL_READ);
            if (!$tmp) {
                broadcast($usernames[$i] . " lost link.\n");
                print "connection closed on socket $i\n";
                close($i);
                continue 2;
            }
            $input[$i] .= $tmp;
            $tmp = substr($input[$i], -1);
            if ($tmp != "\r" && $tmp != "\n") {
                // no end of line, more data coming
                continue;
            }
            $line = trim($input[$i]);
            $input[$i] = "";
            if (empty($line)) {
                continue;
            }
            if (empty($usernames[$i])) {
                if (strlen($line) < 2) {
                    output($i, "Username must be at least two characters.\n");
                } else {
                    $user = substr($line, 0, 16);
                    $f = array_search($user, $usernames);
                    if ($f !== false) {
                        output($i, "That user name is taken, try another.\n");
                    } else {
                        $usernames[$i] = $user;
                        output($i, "You are now known as \"$user\".\n");
                        broadcast("$user has logged on.\n", $i);
                        continue;
                    }
                }
            }
            if (empty($usernames[$i])) {
                output($i, "Username: ");
            } else {
                if (strtolower($line) == "/quit") {
                    output($i, "Bye!\n");
                    broadcast("$usernames[$i] has logged off.", $i);
                    $close[$i] = true;
                } elseif (strtolower($line) == "/shutdown") {
                    $shutting_down = true;
                    broadcast("Shutting down. See you later.\n");
                } elseif (strtolower($line) == "/who") {
                    output($i, "Current users:\n");
                    foreach ($usernames as $u) {
                        output($i, "$u\n");
                    }
                } else {
                    $msg = '['.$usernames[$i].']: '.$line."\n";
                    broadcast($msg, $i);
                    output($i, ">>> $line\n");
                }
            }
        }
        foreach ($writefds as $wfd) {
            $i = (int)$wfd;
            if (!empty($output[$i])) {
                $w = socket_write($wfd, $output[$i]);
                if ($w == strlen($output[$i])) {
                    $output[$i] = "";
                    if (isset($close[$i])) {
                        close($i);
                    }
                } else {
                    $output[$i] = substr($output[$i], $w);
                }
            }
        }
    }
    if ($shutting_down) {
        $may_shutdown = true;
        foreach ($output as $i => $o) {
            if (strlen($o) > 0) {
                print "shutdown: still data on fd $i\n";
                $may_shutdown = false;
                break;
            }
        }
        if ($may_shutdown) {
            print "shutdown complete\n";
            socket_shutdown($sock);
            socket_close($sock);
            exit;
        }
    }
}

function output($user, $msg) {
    global $output;
    settype($user, "int");
    $tmp = substr($msg, -2);
    if ($tmp{1} == "\n" && $tmp{0} != "\r") {
        $msg = substr($msg, 0, -1) . "\r\n";
    }
    $output[$user] .= $msg;
}

function broadcast($msg, $except = null) {
    global $output, $connections, $usernames;
    foreach ($connections as $i => $r) {
        if (empty($usernames[$i])) {
            // don't send messages to users who have not logged on yet
            continue;
        }
        if (!$except || $except != $i) {
            output($i, $msg);
        }
    }
}

function close($i) {
    global $connections, $input, $output, $usernames, $close;
    socket_shutdown($connections[$i]);
    socket_close($connections[$i]);
    unset($connections[$i]);
    unset($input[$i]);
    unset($output[$i]);
    unset($usernames[$i]);
    unset($close[$i]);
}

?>

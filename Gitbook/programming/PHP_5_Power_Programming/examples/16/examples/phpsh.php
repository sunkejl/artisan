#!/bin/sh
exec php -d output_buffering=1 $0 $@
<?php

ob_end_clean();

main(STDIN);

function main($input)
{
    while (true) {
        print "phpsh> ";
        $command = trim(fgets($input));
        if ($command == 'exit') {
            break;
        }
        if (preg_match('/^(\S+)\s+(.*)$/', $command, $matches)) {
            $params = array();
            $state = 1;
            $func = strtolower($matches[1]);
            if ($func == 'main') {
                continue;
            }
            $args = $matches[2];
            if (function_exists($func)) {
                for ($c = $o = 0, $l = strlen($args); $c < $l; $c++) {
                    switch ($state) {
                        case 1: // normal state
                            switch ($args{$c}) {
                                case " ": case "\t":
                                    $params[] = substr($args, $o, $c - $o);
                                    $o = $c;
                                    break;
                                case '"':
                                    $state = 2;
                                    break;
                                case "'":
                                    $state = 3;
                                    break;
                            }
                            break;
                        case 2: // inside ""
                            if ($args{$c} == '"') {
                                $state = 1;
                            }
                            break;
                        case 3: // inside ''
                            if ($args{$c} == "'") {
                                $state = 1;
                            }
                            break;
                    }
                }
                if ($c > $o) {
                    $params[] = substr($args, $o, $c - $o);
                }
                $ret = call_user_func_array($func, $params);
                if ($ret{-1} != "\n") {
                    $ret .= "\n";
                }
                print $ret;
                continue;
            }
        } else {
            $command = strtolower($command);
            if (function_exists($command) && $command != 'main') {
                $command();
                continue;
            }
        }
        print "+ $command\n";
        system($command);
    }
}



?>

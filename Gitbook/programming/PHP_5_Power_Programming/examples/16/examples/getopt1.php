#!/usr/bin/php
<?php

require_once "Console/Getopt.php";

$verbose = 1;
$config_file = $_ENV['HOME'] . '/.myrc';
$options = Console_Getopt::getopt($argv, 'hqvc:');
foreach ($options[0] as $opt) {
    switch ($opt[0]) {
        case 'q':
            $verbose--;
            break;
        case 'v':
            $verbose++;
            break;
        case 'h':
            usage();
            exit;
        case 'c':
            $config_file = $opt[1];
            break;
    }
}

if ($verbose > 1) {
    print "Config file is \"$config_file\".\n";
}

// rest of the script code goes here

function usage() {
    $progname = basename($GLOBALS['argv'][0]);
    fwrite(STDERR, "Usage: $progname [-qvh] [-c config-file]
Options:
   -q         be less verbose
   -v         be more verbose
   -h         display help
   -c <file>  read configuration from <file>
");
}

?>

#!/usr/bin/php
<?php

require_once "Console/Getopt.php";

$verbose = 1;
$config_file = $_ENV['HOME'] . '/.myrc';
$options = Console_Getopt::getopt($argv, 'hqvc::',
                                  array('help', 'quiet', 'verbose', 'config='));
foreach ($options[0] as $opt) {
    var_dump($opt);
    switch ($opt[0]) {
        case 'q': case '--quiet':
            $verbose--;
            break;
        case 'v': case '--verbose':
            $verbose++;
            break;
        case 'h': case '--help':
            usage();
            exit;
        case 'c': case '--config':
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
    fwrite(STDERR, "Usage: $progname [options]
Options:
   -q, --quiet                 be less verbose
   -v, --verbose               be more verbose
   -h, --help                  display help
   -c <file>, --config=<file>  read configuration from <file>
");
}

?>

<?php

require_once 'DB.php';

$dbh = DB::connect("mysql://test@localhost/test");

if (DB::isError($dbh)) {
    print "Connect failed!\n";
    print "Error message: " . $dbh->getMessage() . "\n";
    print "Error details: " . $dbh->getUserInfo() . "\n";
    exit(1);
}

print "Connect ok!\n";


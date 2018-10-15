<?php

require_once 'PEAR.php';
require_once 'DB.php';

PEAR::setErrorHandling(PEAR_ERROR_DIE, "Aborting: %s\n");

$dbh = DB::connect('mysql://test@localhost/test');

// temporarily disable the default handler for this error code:
$dbh->expectError(DB_ERROR_ALREADY_EXISTS);

$res = $dbh->query("INSERT INTO mytable VALUES(1, 2, 3)");

// back to PEAR_ERROR_DIE again:
$dbh->popExpect();

if (PEAR::isError($res) && $res->getCode() == DB_ERROR_ALREADY_EXISTS) {
    print "Duplicate record!\n";
}

?>
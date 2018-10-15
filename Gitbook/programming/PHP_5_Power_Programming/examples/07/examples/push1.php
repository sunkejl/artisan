<?php

require_once 'PEAR.php';
require_once 'DB.php';

PEAR::setErrorHandling(PEAR_ERROR_DIE, "Aborting: %s\n");

$dbh = DB::connect('mysql://test@localhost/test');

// temporarily set the global default error handler
PEAR::pushErrorHandling(PEAR_ERROR_RETURN);

$res = $dbh->query("INSERT INTO mytable VALUES(1, 2, 3)");

// PEAR_ERROR_DIE is once again the active error handler
PEAR::popErrorHandling();

if (PEAR::isError($res)) {
    // duplicate keys will return this error code in PEAR DB:
    if ($res->getCode() == DB_ERROR_ALREADY_EXISTS) {
        print "Duplicate record!\n";
    } else {
        PEAR::throwError($res);
    }
}

?>
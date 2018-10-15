<?php

require_once 'DB.php';

PEAR::setErrorHandling(PEAR_ERROR_DIE, "Aborting: %s\n");

$dbh = DB::connect('mysql://test@localhost/test');
print "DB::connect ok!\n";

?>

<?php

require_once 'DB.php';

$dbh = DB::connect('mysql://test@localhost/test');
if (PEAR::isError($dbh)) {
    die("DB::connect failed (" . $dbh->getMessage() . ")\n");
}
print "DB::connect ok!\n";

?>

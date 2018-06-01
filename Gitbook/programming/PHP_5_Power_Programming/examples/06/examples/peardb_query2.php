<?php

require_once 'DB.php';

PEAR::setErrorHandling(PEAR_ERROR_DIE, "%s<br />\n");
$dbh = DB::connect("mysql://test@localhost/world");
$code = 'NOR';
$result = $dbh->query("SELECT Name FROM City WHERE CountryCode = ?", $code);
while ($result->fetchInto($row)) {
    print "$row[0]<br />\n";
}


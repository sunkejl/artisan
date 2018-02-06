<?php

require_once 'DB.php';

PEAR::setErrorHandling(PEAR_ERROR_DIE, "%s<br />\n");
$dbh = DB::connect("mysql://test@localhost/world");
$result = $dbh->query("SELECT Name FROM City WHERE CountryCode = 'NOR'");
while ($result->fetchInto($row)) {
    print "$row[0]<br />\n";
}


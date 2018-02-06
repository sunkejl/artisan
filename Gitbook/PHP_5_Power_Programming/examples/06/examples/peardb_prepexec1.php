<?php

require_once 'DB.php';

$changes = array(
    array(154351, "Trondheim", "NOR"),
    array(521886, "Oslo", "NOR"),
    array(112405, "Stavanger", "NOR"),
    array(237430, "Bergen", "NOR"),
    array(103313, "Bærum", "NOR"),
);
PEAR::setErrorHandling(PEAR_ERROR_DIE, "%s<br />\n");
$dbh = DB::connect("mysql://test@localhost/world");
$sth = $dbh->prepare("UPDATE City SET Population = ? " .
                     "WHERE Name = ? AND CountryCode = ?");
foreach ($changes as $data) {
    $dbh->execute($sth, $data);
    printf("%s: %d row(s) changed<br />\n", $data[1],
           $dbh->affectedRows());
}


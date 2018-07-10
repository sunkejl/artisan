<?php

require_once 'DB.php';

$dbh = DB::connect("mysql://test@localhost/world");
$dbh->setOption('portability', DB_PORTABILITY_ERRORS);
$dbh->query("CREATE TABLE mypets (name CHAR(15), species CHAR(15))");
$dbh->query("CREATE UNIQUE INDEX mypets_idx ON mypets (name, species)");

$data = array('Bill', 'Mule');

for ($i = 0; $i < 2; $i++) {
    $result = $dbh->query("INSERT INTO mypets VALUES(?, ?)", $data);
    if (DB::isError($result) && $result->getCode() == DB_ERROR_CONSTRAINT) {
        print "Already have a $data[1] called $data[0]!<br />\n";
    }
}

$dbh->query("DROP TABLE mypets");

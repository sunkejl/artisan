<?php

require_once 'DB.php';

PEAR::setErrorHandling(PEAR_ERROR_DIE, "%s<br />\n");
$dbh = DB::connect("mysql://test@localhost/world");
$dbh->query("CREATE TABLE foo (myid INTEGER)");
$next = $dbh->nextId("foo");
$dbh->query("INSERT INTO foo VALUES(?)", $next);
$next = $dbh->nextId("foo");
$dbh->query("INSERT INTO foo VALUES(?)", $next);
$next = $dbh->nextId("foo");
$dbh->query("INSERT INTO foo VALUES(?)", $next);
$result = $dbh->query("SELECT * FROM foo");
while ($result->fetchInto($row)) {
    print "$row[0]<br />\n";
}
$dbh->query("DROP TABLE foo");
#$dbh->dropSequence("foo");

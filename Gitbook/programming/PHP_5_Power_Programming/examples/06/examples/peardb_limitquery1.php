<?php

require_once 'DB.php';

$from = isset($_GET['from']) ? (int)$_GET['from'] : 0;
$show = isset($_GET['show']) ? (int)$_GET['show'] : 0;
$from = $from ? $from : 0;
$show = $show ? $show : 10;
PEAR::setErrorHandling(PEAR_ERROR_DIE, "%s<br />\n");
$dbh = DB::connect("mysql://test@localhost/world");
$result = $dbh->limitQuery("SELECT Name, Population FROM City ".
                           "ORDER BY Population", $from, $show);
while ($result->fetchInto($row)) {
    print "$row[0] ($row[1])<br />\n";
}


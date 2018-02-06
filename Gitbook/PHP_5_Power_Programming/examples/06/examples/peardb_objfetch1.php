<?php

require_once 'DB.php';

class MyResultClass {
    public $row_data;
    function __construct($data) {
        $this->row_data = $data;
    }
    function __get($variable) {
        return $this->row_data[$variable];
    }
}

PEAR::setErrorHandling(PEAR_ERROR_DIE, "%s<br />\n");
$dbh = DB::connect("mysql://test@localhost/world");
$dbh->setFetchMode(DB_FETCHMODE_OBJECT, "MyResultClass");
$code = 'NOR';
$result = $dbh->query("SELECT Name FROM City WHERE CountryCode = ?", $code);
while ($row = $result->fetchRow()) {
    print $row->Name . "<br />\n";
}

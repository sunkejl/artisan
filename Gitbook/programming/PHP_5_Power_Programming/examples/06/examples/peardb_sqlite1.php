<?php

require_once 'DB.php';

PEAR::setErrorHandling(PEAR_ERROR_DIE, "%s<br />\n");
$dbh = DB::connect("sqlite:///test.db");


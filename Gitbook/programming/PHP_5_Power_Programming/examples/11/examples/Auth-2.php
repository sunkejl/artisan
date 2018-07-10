<?php

require_once 'DB.php';
require_once 'PEAR.php';
require_once 'Auth.php';

$auth_options = array(
    'dsn' => 'mysql://test@localhost/test',
    'table' => 'users',
    'usernamecol' => 'username',
    'passwordcol' => 'password',
    'db_fields' => '*',
    );
//PEAR::setErrorHandling(PEAR_ERROR_DIE);
$auth = new Auth('DB', $auth_options);

$auth->start();
if (!$auth->getAuth()) {
    exit;
}

if (!empty($_REQUEST['logout'])) {
    $auth->logout();
    print "<h1>Logged out</h1>\n";
    print "<a href=\"$_SERVER[PHP_SELF]\">Log in again</a>\n";
    exit;
}

print "<h1>Logged in!</h1>\n";

if (!empty($_REQUEST['dump'])) {
    print "<pre>_authsession = ";
    print_r($_SESSION['_authsession']);
    print "</pre>\n";
} else {
    print "<a href=\"$_SERVER[PHP_SELF]?dump=1\">Dump session</a><br>\n";
}

print "<a href=\"$_SERVER[PHP_SELF]?logout=1\">Log Out</a>\n";

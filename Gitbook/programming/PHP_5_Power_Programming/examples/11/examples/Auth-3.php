<?php

require_once "Auth.php";

$auth = new Auth("File", ".htpasswd");
$auth->start();
$remote_addr = $auth->getAuthData("remote_addr");
if (empty($remote_addr)) {
    $remote_addr = $_SERVER["REMOTE_ADDR"];
    $auth->setAuthData("remote_addr", $remote_addr);
}
if ($remote_addr != $_SERVER["REMOTE_ADDR"]) {
    print "remote_addr=$remote_addr REMOTE_ADDR=$_SERVER[REMOTE_ADDR]\n";
    $auth->setExpire(1);
    sleep(1);
}

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
    print "<pre>SESSION=";
    var_dump($_SESSION);
    print "</pre>\n";
} else {
    print "<a href=\"$_SERVER[PHP_SELF]?dump=1\">Dump session</a><br>\n";
}

print "<a href=\"$_SERVER[PHP_SELF]?logout=1\">Log Out</a>\n";

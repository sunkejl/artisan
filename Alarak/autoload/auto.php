<?php
function __autoload($className)
{
    include "lib/" . $className . ".php";
}

$a = new auto();
var_dump($a);

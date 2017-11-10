<?php
function parseStr()
{
    file_get_contents('php://input');
    parse_str("name=Bill&age=60", $myArray);
    var_dump($myArray);
}

function checkChinese()
{
    var_dump(!preg_match("/^[\x7f-\xff]+$/", "啊啊啊"));
}

function replace()
{
    echo str_replace(array("aa", "cc"), "123", "ccbbbbaa");
}

function hashFunction()
{
    $hash = hash("sha256", 123);
    var_dump($hash);
    var_dump($hash[0]);
}

function simpleness()
{
    $parser = "aa";
    $c = $parser ?: 333;
    var_dump($c);
    exit;
}

parseStr();

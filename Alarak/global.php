<?php
$a = 2;
$b = 5;
function change()
{
    $GLOBALS["a"] = 3;
    global $b;
    $b = 6;
    unset($b);//global 不支持unset
}

change();
var_dump($a);
var_dump($b);

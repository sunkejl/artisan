<?php
$a = "123";
$b =& $a;
$b = 234;
var_dump($a);#234

function getResult(){
    return ["a","b","c"];
}
$c=getResult()[0];
var_dump($c);

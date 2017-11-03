<?php
$foo = 1 + "15/2" + "$8";//输出16
$bar = intval("$9");//输出0
var_dump($bar);
var_dump($foo);

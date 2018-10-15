<?php
$arr = [1, 2, 3];
var_dump($arr[-1]);//Notice: Undefined offset: -1 in /opt/www/artisan/Alarak/array&&object.php on line 3

$variable = 1;
var_dump((int)$variable);#int(1)
var_dump((array)$variable);#array(1) { [0] => int(1) }
var_dump((float)$variable);#double(1)
var_dump((double)$variable);#double(1)
var_dump((object)$variable);#class stdClass#1 (1) { public $scalar => int(1) }

<?php
$number = number_format(3.142, 2);
var_dump($number);

$number = sprintf("%1$'x12.2f", 11.142);
var_dump($number);

$a = 1;
$b = -$a;
var_dump($b);

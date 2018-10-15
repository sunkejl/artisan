<?php
$array = [1, 2, 3, 4];
$current = current($array);
$array[0] = "a";
var_dump($current);
var_dump($array);

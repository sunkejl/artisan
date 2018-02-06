<?php
$handle = fopen("ternary.php", "r");
rewind($handle);//rewind — 倒回文件指针的位置
$str = stream_get_contents($handle);
var_dump($str);

$file = file_get_contents("ternary.php");
var_dump($file);


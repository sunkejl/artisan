<?php
//hash 第一个参数 要使用的哈希算法，例如："md5"，"sha256"，"haval160,4" 等。
$h = hash("md5", 123);
$m = md5(123);
var_dump($h);//"202cb962ac59075b964b07152d234b70"
var_dump($m);//"202cb962ac59075b964b07152d234b70"

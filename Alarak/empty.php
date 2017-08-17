<?php
$string = "     123  ";
$string = trim(str_replace(array(1,2,3),"",$string));
var_dump($string);
var_dump(empty($string));//没trim empty空格为false

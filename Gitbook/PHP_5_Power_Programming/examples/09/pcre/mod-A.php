<?php
$str = "ABC";
preg_match('@BC@', $str, $matches1);
preg_match('@BC@A', $str, $matches2);
print_r($matches1);
print_r($matches2);
?>

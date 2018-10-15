<?php
$str = "ABC\nDEF\nGHI";
preg_match('@BC.DE@', $str, $matches1);
preg_match('@BC.DE@s', $str, $matches2);
print_r($matches1);
print_r($matches2);
?>

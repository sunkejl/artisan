<?php
$str = "ABC\n";
preg_match('@BC$@', $str, $matches1);
preg_match('@BC$@D', $str, $matches2);
print_r($matches1);
print_r($matches2);
?>

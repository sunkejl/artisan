<?php
$str = "ABC\nDEF\nGHI";
preg_match('@^DEF@', $str, $matches1);
preg_match('@^DEF@m', $str, $matches2);
print_r($matches1);
print_r($matches2);
?>

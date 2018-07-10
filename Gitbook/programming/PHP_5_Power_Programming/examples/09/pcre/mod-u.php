<?php
$str = 'Dérick'; 
preg_match('@D.rick@', $str, $matches1);
preg_match('@D.rick@u', $str, $matches2);
print_r($matches1);
print_r($matches2);
?>

<?php
$subject = 'PHP\5';
$pattern1 = '/^PHP\\\5$/';
$pattern2 = "/^PHP\\\101$/";
$ret1 = preg_match($pattern1, $subject, $matches1);
$ret2 = preg_match($pattern2, $subject, $matches2);
var_dump($pattern1, $pattern2, $matches1, $matches2);
?>

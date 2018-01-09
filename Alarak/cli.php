<?php
$d = 123;
$a = $b = $c = $d;
var_dump($a);
var_dump($b);
var_dump($c);
if (php_sapi_name() === 'cli') {
    echo "cli";
}

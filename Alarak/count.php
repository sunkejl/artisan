<?php

$hash=hash("sha256",123);
var_dump($hash);
var_dump($hash[0]);
exit;
$parser="aa";
$c = $parser ?:333;
var_dump($c);exit;

$arr = [[1], [2], [2], [4]];
var_dump(add($arr));

function add($arr)
{
    $total = 0;
    $arr2 = [];
    foreach ($arr as $k => $v) {
        $arr2[$k]["t"] =& $total;
        $total += $v[0];
    }
    $total=12;
    unset($total);
    var_dump($arr2);exit;
    return $arr2;
}





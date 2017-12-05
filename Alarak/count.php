<?php
function c()
{
    static $c;
    if(!isset($c)){
        echo "dd";
        $c=2;
    }
    return $c;
}
var_dump(c());
var_dump(c());
var_dump(c());
exit;
echo strlen("812173110050");
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
    $total = 12;
    unset($total);
    var_dump($arr2);
    exit;
    return $arr2;
}





<?php
$c = [1, 2, 3];
$d = [5, 6, 7];
foreach ($c as $k => $v) {
    foreach ($d as $kd => $vd) {
        if ($vd == 6) {
            break;
        }
        echo $vd;
    }
    echo $v;
    break;
}
exit;
$arr = [12, 13, 14];
$c = array_flip($arr);
var_dump($arr);
unset($c['12']);
$arr = array_flip($c);
var_dump($arr);
var_dump($c);
exit;
function c()
{
    static $c;
    if (!isset($c)) {
        echo "dd";
        $c = 2;
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





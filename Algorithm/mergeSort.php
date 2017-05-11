<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/29
 * Time: 11:52
 */

function mergeSort($array)
{
    if (count($array) <= 1) {
        return $array;
    }
    $half = ceil(count($array) / 2);
    $arrayChuck = array_chunk($array, $half);
    $left = mergeSort($arrayChuck[0]);
    $right = mergeSort($arrayChuck[1]);
    while (count($left) && count($right)) {
        if ($left[0] < $right[0]) {
            $reg[] = array_shift($left);
        } else {
            $reg[] = array_shift($right);
        }
    }
    $r = array_merge($reg, $left, $right);
    return $r;
}

$array = [5, 4, 3, 2, 1];
$arrayNew = mergeSort($array);
var_dump($arrayNew);



//543 , 21 => 54,3  ,21     => 5,4,   3 ,21=> 4,5 ,3 ,21 =>3,4,5  , 21 => 3,4,5,  1,2 => 1    , 3,4,5,   2 => 1,2,3,4,5
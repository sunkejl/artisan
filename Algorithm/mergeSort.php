<?php

namespace Algorithm\mergeSort;

/**
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


//5 4 3 2 1
//5 4 3 ,2 1 先分成俩个 再对5 4 3 递归
//(5 4 ,3) ,2 1
//((5,4),3),2 1  递归到left 和 right都只有一个元素 比较4 5
//((4,5),3),2,1 比较4 和3 把3 推入新的数组 再把(4,5)推入
//(3,4,5),(2,1) 对2，1递归
//(3,4,5),(1,2)
//3 4 5 ,2  (1)
//3 4 5,     (1,2) 对左右第一个元素比较 直到 某个数组没有元素  把剩余的推入新数组
//1 2 3 4 5


//5 4 3 2
//5 4 ,3 2
//5,4 ,3,2  先分隔成最小的
//4,5
//4 5 ,2 3  先4和2做比较 发现2小 推入另一个数组中
//4 5 ,3    (2) 在比较 剩余的4和3  接着把三推入应一个
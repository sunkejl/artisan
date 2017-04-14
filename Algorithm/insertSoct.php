<?php
/**
 * https://en.wikipedia.org/wiki/Insertion_sort
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/29
 * Time: 10:07
 */


$arr = array(9, 8, 7, 6, 5, 4, 3, 2, 1);
$len = count($arr);
$t = 0;
for ($i = 1; $i < $len; $i++) {
    $tmp = $arr[$i];
    for ($j = $i - 1; $j > -1; $j--) {
        if ($tmp < $arr[$j]) {
            $arr[$j + 1] = $arr[$j];
            $arr[$j] = $tmp;
            ++$t;//计算所用次数
        }
    }
}
var_dump($arr);
var_dump($t);


//降序排列 n(n-1)/2   O(n*n)

//打牌 第一个假设已经排好 从第二个开始 插入
//3 7 4 9 5 2 6 1
//3 7 4 9 5 2 6 1
//3 7 4 9 5 2 6 1
//3 4 7 9 5 2 6 1
//3 4 7 9 5 2 6 1
//3 4 5 7 9 2 6 1
//2 3 4 5 7 9 6 1
//2 3 4 5 6 7 9 1
//1 2 3 4 5 6 7 9
<?php
/**
 * https://en.wikipedia.org/wiki/Insertion_sort
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
        var_dump($arr);
    }
}
var_dump($arr);
var_dump($t);


//降序排列 n(n-1)/2   O(n*n)

//只排列索引i左边的元素,直到索引到达最右边
//打牌 第一个假设已经排好 从第二个开始 插入
//6 5 4 3 2 1
//5 6 4 3 2 1
//5 4 6 3 2 1
//4 5 6 3 2 1
//4 5 3 6 2 1
//4 3 5 6 2 1
//3 4 5 6 2 1
//3 4 5 2 6 1
//3 4 2 5 6 1
//3 2 4 5 6 1
//2 3 4 5 6 1
//2 3 4 5 1 6
//2 3 4 1 5 6
//2 3 1 4 5 6
//2 1 3 4 5 6
//1 2 3 4 5 6

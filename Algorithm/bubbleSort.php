<?php
/**
 * 冒泡排序
 * 重复地走访过要排序的数列，一次比较两个元素，如果他们的顺序错误就把他们交换过来。
 * 选择排序和冒泡排序 的区别 交换过程不一样 查找过程不一样
 */
$arr = [4, 5, 3, 2, 1];
$len = count($arr);
for ($i = 0; $i < $len - 1; $i++) {
    for ($j = 0; $j < $len - $i - 1; $j++) {
        if ($arr[$j] > $arr[$j + 1]) {
            $temp = $arr[$j];
            $arr[$j] = $arr[$j + 1];
            $arr[$j + 1] = $temp;
        }
    }
}
var_dump($arr);

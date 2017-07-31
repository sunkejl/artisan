<?php
/**
 *  使用用户自定义的比较函数对数组中的值进行排序,可用于二维数组的比较
 *  http://php.net/manual/zh/function.usort.php
 */
$array = [1, 5,3, 3, 4, 4];
usort($array, function ($a, $b) {
    if ($a == $b) {
        return 0;
    }
    //第一个参数< = > 第二个参数  返回 < = > 0的整数
    if ($a < $b) {
        return -1;
    } else {
        return 1;
    }
});
var_dump($array);

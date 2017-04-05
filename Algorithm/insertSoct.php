<?php
/**
 * https://en.wikipedia.org/wiki/Insertion_sort
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/29
 * Time: 10:07
 */

$array = [5, 4, 3, 2, 1, 5, 1, 2];
for ($i = 1; $i < count($array); $i++) {
    $tmp = $array[$i];
    for ($j = $i - 1; $j >= 0; $j--) {
        if ($tmp < $array[$j]) {
            $array[$j + 1] = $array[$j];
            $array[$j] = $tmp;
        }
    }

}
var_dump($array);
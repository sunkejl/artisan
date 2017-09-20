<?php
/**
 * @link https://www.tutorialspoint.com/data_structures_algorithms/shell_sort_algorithm.htm
 */
$arr = range(100, 1);
$bar=$arr;
$len = count($arr);
for ($gap = floor(count($arr) / 2); $gap > 0; $gap = floor($gap / 2)) {
    for ($i = intval($gap); $i < count($arr); $i++) {
        $temp = $arr[$i];
        for ($j = $i - $gap; $j >= 0 && $arr[$j] > $temp; $j = $j - $gap) {
            $arr[$j + $gap] = $arr[$j];
        }
        $arr[$j + $gap] = $temp;
    }
}

for (; ;) {
    $a = 1;
}

<?php
function quickSort($array)
{
    $length = count($array);
    if ($length <= 1) {
        return $array;
    }
    $left = $right = array();
    $middleValue = $array[0];
    for ($i = 1; $i < $length; $i++) {
        if ($array[$i] < $middleValue) {
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }
    }
    $r = array_merge(quickSort($left), (array)$middleValue, quickSort($right));
    return $r;
}

$array = array(5, 4, 3, 2, 1);

var_dump(quickSort($array));

//O(n*log(n));

//(4,3,2,1) 5 ()      把小于5的放入左边 大于5的放入右边
//((3,2,1) 4 () ) 5   对左右进行递归
//((2,1) 3 ) 4 5
// (1) 2 3 4 5        再一步一步按递归展开回去


//合并排序  是比较($left[0] < $right[0])
//快速排序  是把元素和基准进行比较


function quickSortA($array)
{
    $len = count($array);
    $i = 1;
    for ($j = 1; $j < $len; $j++) {
        foreach ($array as $k => $v) {
            if ($array[0] < $v) {
                $i = $k - 1;
                break;
            }
        }
        if ($array[0] > $array[$j]) {
            $tmp = $array[$j];
            $array[$j] = $array[$i + 1];
            $array[$i + 1] = $tmp;
            $i++;
        }
    }
    $tmpF = $array[$i];
    $array[$i] = $array[0];
    $array[0] = $tmpF;

    return $array;
}

$array = array(5, 4, 8, 7, 6, 9, 3, 2, 1);
$r = quickSortA($array);
var_dump($r);

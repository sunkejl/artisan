<?php
//组合
$arr = array(1, 2, 2, 2, 3, 3, 1, 1, 2, 2, 3, 5, 2, 4, 4, 4, 1, 2, 4);
var_dump(combineArray($arr));
function combineArray($arr, $arrayStorage = [])
{
    if (count($arr) == 1) {
        array_push($arrayStorage, $arr[0]);
        return $arrayStorage;
    }
    if (count($arr) == 0) {
        return $arrayStorage;
    }
    $arrFirst = $arr[0];
    $count = count($arr);
    unset($arr[0]);
    for ($j = 1; $j < $count; $j++) {
        if (($arrFirst + $arr[$j]) > 5) {
            array_push($arrayStorage, $arrFirst);
            return combineArray(array_values($arr), $arrayStorage);
        }
        $arrFirst = $arrFirst + $arr[$j];
        unset($arr[$j]);
    }
}

exit;
//拆分
$arrToExplode = [[1, 2], [2, 2], [3, 2]];
$arrAfterExplode = [];
for ($i = 0; $i < count($arrToExplode); $i++) {
    if ($arrToExplode[$i][1] > 1) {
        for ($j = 0; $j < $arrToExplode[$i][1]; $j++) {
            array_push($arrAfterExplode, [$arrToExplode[$i][0], 1]);
        }
    }
}
var_dump($arrAfterExplode);

//合并
$array = [[1, 1], [1, 1], [2, 1], [3, 1]];
$c = 0;
for ($i = 0; $i < count($array); $i++) {
    for ($j = $i + 1; $j < count($array); $j++) {
        if (!isset($array[$i]) || !isset($array[$j])) {
            continue;
        }
        if ($array[$i][0] == $array[$j][0]) {
            $array[$i][1]++;
            unset($array[$j]);
        }
    }
}
$arr1 = array_values($array);
var_dump($arr1);


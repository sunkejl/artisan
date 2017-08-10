<?php
/**
 * 选择排序 先从右边选出最小的给第一个，然后接着从剩余未排序中，选出最小的，给第二个 直到到达最后
 * n(n-1)/2
 */
$array=[6,5,4,3,2,1];
for($i=0;$i<count($array);$i++){
    for($j=$i;$j<count($array)-1;$j++){
        if($array[$i]>$array[$j+1]){
            $temp=$array[$i];
            $array[$i]=$array[$j+1];
            $array[$j+1]=$temp;
        }
    }
}
var_dump($array);




//6 5 4 3 2 1
//1 6 5 4 3 2
//1 2 6 5 4 3
//1 2 3 6 5 4
//1 2 3 4 6 5
//1 2 3 4 5 6

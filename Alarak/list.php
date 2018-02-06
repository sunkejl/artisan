<?php
$arr = array("ak" => "a", "bk" => "b", "ck" => "c");
//返回数组中当前的键／值对并将数组指针向前移动一步
var_dump(each($arr));
//list() 仅能用于数字索引的数组，并假定数字索引从 0 开始。
list($a, $b) = each($arr);
var_dump($a);
var_dump($b);

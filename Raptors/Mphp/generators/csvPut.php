<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/14
 * Time: 17:41
 */
#生成6M的数据
#echo ini_get("memory_limit");
ini_set("memory_limit", "500M");
$handle = fopen("data.csv", 'w');

$arr = [];
for ($i = 1; $i < 1000000; $i++) {
    $arr[] = (array)$i;
}
foreach ($arr as $fields) {
    fputcsv($handle, $fields);
}

fclose($handle);;

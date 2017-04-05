<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/14
 * Time: 17:13
 */
ini_set("memory_limit", "500M");
$memery1 = xdebug_memory_usage();
function getRows($file)
{
    $handle = fopen($file, 'rb');
    if (!$handle) {
        throw new Exception();
    }

    $data = [];
    while (!feof($handle)) {
        $data[] = fgetcsv($handle);
    }
    fclose($handle);
    return $data;
}

echo $memery1 . PHP_EOL;
//$data = getRows('data.csv'); 不用$data存储的话最终内存释放掉了 峰值还在
//foreach ($data as $k) {
//
//}
foreach (getRows('data.csv') as $k) {

}

$memery2 = xdebug_memory_usage();
echo xdebug_peak_memory_usage() . PHP_EOL;#峰值
echo $memery2 - $memery1 . PHP_EOL;
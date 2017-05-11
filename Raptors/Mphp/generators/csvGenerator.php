<?php
/**
 * 读写大文件 不占用内存
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
    while (!feof($handle)) {
        yield fgetcsv($handle);
    }
    fclose($handle);
}


echo $memery1 . PHP_EOL;

foreach (getRows('data.csv') as $k) {

}

$memery2 = xdebug_memory_usage();
echo xdebug_peak_memory_usage() . PHP_EOL;
echo $memery2 - $memery1 . PHP_EOL;
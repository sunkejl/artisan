<?php
/**
 * 1bity=8bit
 * 1kb=1024bity
 * 1M=1024kb
 * xdebug显示的是bity 所以需要/1024×1024(1048576)
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/14
 * Time: 16:52
 */
$start1 = xdebug_time_index();
$memery1 = xdebug_memory_usage();

function makeRange($length)
{
    $dataset = [];
    for ($i = 0; $i < $length; $i++) {
        $dataset[] = $i;
    }
    return $dataset;
}

$customRange = makeRange(1000000);
foreach ($customRange as $i) {
    # echo $i . PHP_EOL;
}

$start2 = xdebug_time_index();
echo $start2 - $start1 . PHP_EOL;
$memery2 = xdebug_memory_usage();
echo $memery2 - $memery1 . PHP_EOL;


$start1 = xdebug_time_index();
$memery1 = xdebug_memory_usage();

function makeRangeByYield($length)
{
    for ($i = 0; $i < $length; $i++) {
        yield $i;
    }
}

foreach (makeRangeByYield(1000000) as $i) {
    #echo $i . PHP_EOL;
}

$start2 = xdebug_time_index();
echo $start2 - $start1 . PHP_EOL; #单位是秒
$memery2 = xdebug_memory_usage();#单位是byte
echo $memery2 - $memery1 . PHP_EOL;

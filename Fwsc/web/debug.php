<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/25
 * Time: 15:08
 */
error_reporting(E_ALL);
$start = xdebug_time_index();
$i=1;
while ($i < 10000000) {
    ++$i;
}
$stop=xdebug_time_index();
// do something
var_dump($start);
var_dump($stop);
$time = $stop - $start;
var_dump(error_log("$time", 3, __DIR__."/log/error.log"));
exit;
<?php
/**
 * 字符串只支持递增 不支持递减
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/24
 * Time: 17:45
 */
$array=range("a","z");
foreach ($array as $v){
    echo ++$v.PHP_EOL;
}

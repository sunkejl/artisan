<?php
/**
 * ASC编码对应
 * Raptors/Mphp/closure/ordAndChr.php
 */
$location = ord("a");#获取ASCII的数字
var_dump($location);
exit;
$foo = chr($location + 1);
var_dump($foo);
for ($i = 0; $i < 200; $i++) {
    var_dump($i . "=>" . chr($i));#根据数字返回ASCII编码
}
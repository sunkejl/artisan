<?php
/**
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/6
 * Time: 15:31
 */
$fp=fopen('/data/index.txt','w++');
$fr=fread($fp,100);
$fg=fgets($fp);
#var_dump($fr);
var_dump($fg);
//$fp = popen('ls -l /', 'r');
//while (!feof($fp)) {
//    echo fgets($fp);
//}
//pclose($fp);

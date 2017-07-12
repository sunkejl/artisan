<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 12:14
 */
$string = "     123  ";
$string = trim(str_replace(array(1,2,3),"",$string));
var_dump($string);
var_dump(empty($string));//没trim empty空格为false

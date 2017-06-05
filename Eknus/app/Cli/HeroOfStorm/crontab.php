<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/5
 * Time: 14:58
 */
require dirname(dirname(dirname(dirname(dirname(__FILE__))))) . DIRECTORY_SEPARATOR . "vendor/autoload.php";
$h=new \App\Http\Controllers\HeroOfStorm\Heroes();
$h->get();

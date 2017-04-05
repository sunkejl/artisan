<?php
/**
 * psr-3 log标准
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17
 * Time: 17:35
 */
require "vendor/autoload.php";
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

date_default_timezone_set("Asia/Shanghai");
$log = new Logger("myApp");
$log->pushHandler(new StreamHandler("logs/development.log", Logger::DEBUG));
$log->pushHandler(new StreamHandler("logs/production.log", Logger::WARNING));

$log->debug("this is a debug", ['key' => 'value', "key1" => "value1"]);
$log->warning("this is a warning", ['key' => 'value', "key1" => "value1"]);


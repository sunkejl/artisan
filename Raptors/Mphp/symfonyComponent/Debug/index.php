<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/31
 * Time: 14:05
 */
include "vendor/autoload.php";
\Symfony\Component\Debug\Debug::enable();
\Symfony\Component\Debug\ErrorHandler::register();
\Symfony\Component\Debug\ExceptionHandler::register();
\Symfony\Component\Debug\DebugClassLoader::enable();

throw  new Exception("msg",100);


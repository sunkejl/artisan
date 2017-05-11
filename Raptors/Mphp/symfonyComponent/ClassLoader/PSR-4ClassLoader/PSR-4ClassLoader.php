<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/28
 * Time: 16:38
 */
use Symfony\Component\ClassLoader\Psr4ClassLoader;

require '../vendor/symfony/class-loader/Psr4ClassLoader.php';

$loader = new Psr4ClassLoader();
$loader->addPrefix('Lib\\Foo\\', __DIR__ . '/Lib');
$loader->register();
$foo=new \Lib\Foo\Foo();
var_dump($foo);



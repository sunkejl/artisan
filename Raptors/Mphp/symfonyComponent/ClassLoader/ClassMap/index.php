<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/28
 * Time: 15:53
 */
$mapping= include __DIR__ . "/class_map.php";
require_once '../vendor/symfony/class-loader/MapClassLoader.php';
$loader=new \Symfony\Component\ClassLoader\MapClassLoader($mapping);
$loader->register();

use Acme\Foo\Foo;
$foo=new Foo();
var_dump($foo);
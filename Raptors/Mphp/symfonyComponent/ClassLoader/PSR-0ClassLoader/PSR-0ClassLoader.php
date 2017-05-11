<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/28
 * Time: 14:07
 */
#todo
require_once '../vendor/symfony/class-loader/ClassLoader.php';
use Symfony\Component\ClassLoader\ClassLoader;

$loader = new ClassLoader();
$loader->setUseIncludePath(true);
$loader->addPrefix('Src\\Foo\\', __DIR__ . '/Src/Common');
$loader->register();
$prefixes = $loader->getPrefixes();
var_dump($prefixes);exit;
new \Src\Foo\Foo();



<?php
/**
 *   "autoload": {"psr-4": {"App\\": "App/"}不需要手动dump-autoload
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/25
 * Time: 14:22
 */
include "vendor/autoload.php";
use App\Foo;
use App\Bar;

$foo = new Foo();
var_dump($foo);
$bar = new Bar();
var_dump($bar);

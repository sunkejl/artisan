<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/28
 * Time: 15:18
 */
use Bar\Bar;
use Src\Foo\Foo;
include "Bar.php";
include "Src/Common/Foo.php";
$foo=new Foo();
$bar=new Bar();
var_dump($foo);


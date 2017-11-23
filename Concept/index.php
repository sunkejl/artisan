<?php
namespace a;
/**
 * 静态方法共享
 * Class foo
 */
class foo
{
    static $id = 1;
    public $uid = 1;

    function __construct()
    {
        self::$id++;
        $this->uid = self::$id;
    }
}

$obj1 = new foo();
var_dump(foo::$id);#2
var_dump($obj1->uid);#2
$obj2 = new foo();
var_dump(foo::$id);#3
var_dump($obj2->uid);#3
?>

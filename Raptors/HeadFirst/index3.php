<?php
namespace d;

/**
 * __tostring魔术方法
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/3
 * Time: 22:57
 */
class Person
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    function __toString()
    {
        return $this->name;
    }
}
$person= new Person("sk");
echo $person;


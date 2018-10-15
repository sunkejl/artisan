<?php
namespace d;

/**
 * __tostring魔术方法
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


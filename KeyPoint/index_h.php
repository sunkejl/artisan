<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/20
 * Time: 17:48
 */
class Obj implements arrayaccess
{
    private $contain = array();

    public function __construct()
    {
        $this->contain = ['id' => 1, 'name' => "abc"];
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        return $this->contain[$offset];
    }

    public function offsetSet($offset, $value)
    {
        return $this->contain[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

}
$obj=new Obj();
$obj->offsetSet("dd","cc");
var_dump($obj->offsetGet("dd"));
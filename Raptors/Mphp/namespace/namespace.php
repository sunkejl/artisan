<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17
 * Time: 17:28
 */
namespace My\App;

class Foo{
    public function throwAException(){
        throw new \Exception();#加\去全局找这个方法
    }
}
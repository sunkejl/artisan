<?php
/**
 * 每个类的实例拥有自己的属性拷贝
 * 静态属性属于类本身 不属于类的实例
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/26
 * Time: 18:15
 */

class MyClass{
        static $idStatic;
    public $id;
    /**
     * MyClass constructor.
     */
    public function __construct()
    {
        self::$idStatic++;
        $this->id=self::$idStatic;
    }
}
$foo=new MyClass();
var_dump($foo->id);
$bar=new MyClass();
var_dump($bar->id);



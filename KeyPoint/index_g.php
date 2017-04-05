<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/17
 * Time: 17:09
 */
namespace KeyPoint;

class barParent{
    public $num=12;
}
class bar extends barParent{
    public function __construct(array $v=array())
    {
        var_dump($this);
    }

}
new bar();

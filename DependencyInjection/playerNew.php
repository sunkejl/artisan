<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/6
 * Time: 17:29
 */
namespace DI_N;

class Pass
{
    function getPass($name)
    {
        echo "class_pass_" . $name . "\n";
    }
}

class contain
{
    public $contains;
    public $set;

    function bind($name, $fun)
    {
        if ($fun instanceof \Closure) {
            $this->contains[$name] = $fun;
        } else {
            $this->set[$name] = $fun;
        }
    }

    function make($name)
    {
        if (isset($this->set[$name])) {
            echo $this->set[$name];
        } elseif (isset($this->contains[$name])) {
            return call_user_func_array($this->contains[$name], ["sk"]);
        } else {
            return false;
        }
    }

    function get()
    {
        $pass = new Pass();
        call_user_func_array([$pass, "getPass"], ["sk"]);
    }
}

$c = new contain();
//绑定,先存起来 但没有实例化 向容器添加一段可以回调的函数 等到执行时再触发
$c->bind("pass", function () {
    return new Pass();
});
$c->bind("shoot", "23");
//$c->get();

$c->bind("history", "july\n");
$c->make("history");

//需要使用时再实例化
$c->make("pass")->getPass("january");

//手动提供参数
//更进一步 根据类的依赖需求，
//自动在注册、绑定的一堆实例中搜寻符合的依赖需求，
//并自动注入到构造函数参数中去。
//通过反射 http://php.net/manual/zh/book.reflection.php
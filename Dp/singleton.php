<?php

/**
 * A Class has one instance, It provides a global access point to it
 * 单例模式是非常有用的，特别是我们需要确保在整个请求的声明周期内只有一个实例存在。
 * 典型的应用场景是，当我们有一个全局的对象（比如配置类）或一个共享的资源（比如事件队列）时。
 * 你应该非常小心地使用单例模式，因为它非常自然地引入了全局状态到你的应用中，降低了可测试性。
 * 在大多数情况下，依赖注入可以（并且应该）代替单例类。 使用依赖注入意味着我们不会在设计应用时引入不必要的耦合，因为对象使用共享的或全局的资源，不再需要耦合具体的类。
 */
class Singleton
{
    private static $instance;
    public $name = "sk";

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * 把构造函数声明为 protected，防止用 `new` 操作符在这个类之外创建新的实例
     */
    protected function __construct()
    {
    }

    /**
     * 把 clone 方法声明为 private，防止克隆单例
     */
    private function __clone()
    {
    }
}

class SingletonChild extends Singleton
{
}

$obj = Singleton::getInstance();
var_dump($obj === Singleton::getInstance());             // bool(true)
$obj->name = "hello";
var_dump($obj->name);
$otherObj = Singleton::getInstance();
var_dump($otherObj->name);


$anotherObj = SingletonChild::getInstance();
var_dump($anotherObj === Singleton::getInstance());      // bool(false)

var_dump($anotherObj === SingletonChild::getInstance()); // bool(true)
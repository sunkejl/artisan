<?php

abstract class PcFactory
{
    abstract function createKeyBoard();

    abstract function createMouse();
}

class DellFactory extends PcFactory
{
    function createKeyBoard()
    {
        return new DellKeyBoard();
    }

    function createMouse()
    {
        return new DellMouse();
    }
}

class HpFactory extends PcFactory
{
    function createKeyBoard()
    {
        return new  HpKeyBoard();
    }

    function createMouse()
    {
        return new HpMouse();
    }
}

//使用抽象工厂模式，能够在具体工厂变化的时候，不用修改使用工厂的客户端代码，甚至是在运行时。


//假设我们增加华硕工厂，则我们需要增加华硕工厂，和戴尔工厂一样，继承PC厂商。  之后创建华硕鼠标，继承鼠标类。创建华硕键盘，继承键盘类。  即可。
//在抽象工厂模式中，假设我们需要增加一个产品假设我们增加耳麦这个产品，
//则首先我们需要增加耳麦这个父类，再加上戴尔耳麦，惠普耳麦这两个子类。
//之后在PC厂商这个父类中，增加生产耳麦的接口。最后在戴尔工厂，惠普工厂这两个类中，分别实现生产戴尔耳麦，惠普耳麦的功能。


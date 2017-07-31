<?php

/**
 * In Visitor(访问者) pattern, we use a visitor class which changes the executing algorithm of an element class.
 * By this way, execution algorithm of element can vary as and when visitor varies.
 * element object has to accept the visitor object so that visitor object handles the operation on the element object.
 * accept方法 接收 访问者对象
 * 在对象结构的一次访问过程中，我们遍历整个对象结构，对每一个元素都实施accept方法,回调访问者的visit方法
 * 从而使访问者得以处理对象结构的每一个元素
 */
interface ComputerPart
{
    function accept(ComputerPartVisitor $computerPartVisitor);
}

class Computer implements ComputerPart
{
    public $parts = array();

    public function __construct()
    {
        $this->parts = array(new Keyboard(), new Mouse());
    }

    function accept(ComputerPartVisitor $computerPartVisitor)
    {
        foreach ($this->parts as $v) {
            $v->accept($computerPartVisitor);
        }
        $computerPartVisitor->visitComputer();
    }
}

class Keyboard implements ComputerPart
{
    function accept(ComputerPartVisitor $computerPartVisitor)
    {
        $computerPartVisitor->visitKeyboard();
    }
}

class Mouse implements ComputerPart
{
    function accept(ComputerPartVisitor $computerPartVisitor)
    {
        $computerPartVisitor->visitMouse();
    }
}

class ComputerPartVisitor
{
    function visitMouse()
    {
        echo __FUNCTION__ . PHP_EOL;
    }

    function visitKeyboard()
    {
        echo __FUNCTION__ . PHP_EOL;
    }

    function visitComputer()
    {
        echo __FUNCTION__ . PHP_EOL;
    }
}

$computer = new Computer();
$computer->accept(new ComputerPartVisitor());

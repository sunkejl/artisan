<?php

/**
 * 原型模式
 * Prototype pattern refers to creating duplicate(重复) object while keeping performance in mind.
 * create a clone of the current object
 */
class Student
{
    public $name;

    function copy()
    {
        return clone $this;
    }
}

$student = new Student();
var_dump($student->name = 12);
$studentCopy = $student->copy();//下次调用 保留了原来订单里的属性
var_dump($studentCopy->name);
var_dump($studentCopy);


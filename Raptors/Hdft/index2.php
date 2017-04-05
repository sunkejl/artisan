<?php
namespace c;

/**
 * 多态 polymorphism
 * OOP不是简单的吧函数和数据简单的结合起来，而是用类和继承来描述
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/3
 * Time: 22:10
 */
abstract class Animal
{
    abstract function makeSound();
}

class Cat extends Animal
{
    function makeSound()
    {
        print_r(__CLASS__);
    }
}

class Dog extends Animal
{
    function makeSound()
    {
        print_r(__CLASS__);
    }
}

class Person
{
}

function showSound(Animal $animal)
{
    echo $animal->makeSound();
}

showSound(new Cat());
showSound(new Dog());
showSound(new Person());

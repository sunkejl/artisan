<?php
/**
 * 定义一个抽象类，将部分逻辑以具体方法及具体构造子类的方法实现，然后声明一些抽象方法来迫使子类实现剩余的逻辑。
 * 不同的子类可以以不同的方式实现这些抽象方法，从而对剩余的逻辑有不同的实现。
 * 先构建一个顶级逻辑框架，而将逻辑的细节留给具体的子类去实现。
 * 抽象父类 控制反转  调用子类的实现
 * In Template pattern, an abstract class exposes defined way(s)/template(s) to execute its methods.
 * Its subclasses(子类) can override the method implementation as per need
 * but the invocation(调用) is to be in the same way as defined by an abstract class.
 */

namespace Dp\template;


abstract class Game
{
    abstract function initialize();

    abstract function startPlay();

    abstract function endPlay();

    final function play()//控制反转关键
    {
        $this->initialize();
        $this->startPlay();
        $this->endPlay();
    }
}

class Basketball extends Game
{
    function initialize()
    {
        echo __CLASS__ . __FUNCTION__ . "\n";
    }

    function startPlay()
    {
        echo __CLASS__ . __FUNCTION__ . "\n";
    }

    function endPlay()
    {
        echo __CLASS__ . __FUNCTION__ . "\n";
    }
}

class Football extends Game
{
    function initialize()
    {
        echo __CLASS__ . __FUNCTION__ . "\n";
    }

    function startPlay()
    {
        echo __CLASS__ . __FUNCTION__ . "\n";
    }

    function endPlay()
    {
        echo __CLASS__ . __FUNCTION__ . "\n";
    }
}

$basketball = new Basketball();
$basketball->initialize();
$basketball->startPlay();
$basketball->endPlay();

$football = new Football();
$football->initialize();
$football->startPlay();
$football->endPlay();


<?php
/**
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

    final function play()
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


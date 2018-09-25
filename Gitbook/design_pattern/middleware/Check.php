<?php
//责任链实现中间件

abstract class Verify
{
    public $next;

    function setNext($next)
    {
        $this->next = $next;
    }

    public function check()
    {
        $this->doCheck();
        if ($this->next) {
            $this->next->check();
        }
    }

    abstract function doCheck();
}

class FirstVerify extends Verify
{
    function doCheck()
    {
        echo __CLASS__ . PHP_EOL;
    }
}

class SecondVerify extends Verify
{
    function doCheck()
    {
        echo __CLASS__ . PHP_EOL;
    }
}

class ThirdVerify extends Verify
{
    function doCheck()
    {
        echo __CLASS__ . PHP_EOL;
    }
}

class VerifySomeThing
{
    public function handle()
    {
        $firstVerify = new FirstVerify();
        $secondVerify = new SecondVerify();
        $thirdVerify = new ThirdVerify();
        $firstVerify->setNext($secondVerify);
        $secondVerify->setNext($thirdVerify);
        $firstVerify->check();
    }
}

$v = new VerifySomeThing();
$v->handle();

<?php
/**
 * 对象的某个行为在不同的场景中，该行为有不同的实现。给对象的方法传递不同的对象来实现
 * In Strategy(策略) pattern, a class behavior or its algorithm can be changed at run time.
 */

namespace Dp\strategy;

interface Strategy
{
    function doOperation($num1, $num2);
}

class OperationAdd implements Strategy
{
    function doOperation($num1, $num2)
    {
        return $num1 + $num2;
    }
}

class OperationSubstract implements Strategy
{
    function doOperation($num1, $num2)
    {
        return $num1 - $num2;
    }
}

class Context
{
    public $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    function executeStrategy($num1, $num2)
    {
        return $this->strategy->doOperation($num1, $num2);
    }
}

$r1 = (new Context(new OperationAdd()))->executeStrategy(1, 2);
$r2 = (new Context(new OperationSubstract()))->executeStrategy(1, 3);
var_dump($r1);
var_dump($r2);


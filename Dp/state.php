<?php
/**
 * state(状态)
 * In State pattern a class behavior changes based on its state.
 */

namespace Dp\state;

interface State
{
    function doAction(Context $context);
}

class StopState
{
    function doAction(Context $context)
    {
        $context->setContext($this);
    }

    function toString()
    {
        return "stop";
    }
}

class StartState
{
    function doAction(Context $context)
    {
        $context->setContext($this);
    }

    function toString()
    {
        return "start";
    }
}

class Context
{
    public $context;

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param mixed $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }
}

$context = new Context();
(new StartState())->doAction($context);
var_dump($context->getContext()->toString());
(new StopState())->doAction($context);
var_dump($context->getContext()->toString());

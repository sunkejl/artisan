<?php

/**
 * 解释器模式
 * interpret(翻译)
 * 定义语言的语法，并由解释器来解释语言中的语句 常用于sql解析
 * Interpreter pattern provides a way to evaluate(估价) language grammar or expression.
 * This pattern is used in SQL parsing, symbol processing engine etc.
 */
interface Expression
{
    function interpret($context);
}

class TerminalExpression implements Expression
{
    public $context;

    public function __construct($context)
    {
        $this->context = $context;
    }

    function interpret($context)
    {
        if ($this->context != $context) {
            return false;
        }
        return $context;
    }
}

class OrExpression implements Expression
{
    public $expr1;
    public $expr2;

    public function __construct(Expression $expr1, Expression $expr2)
    {
        //Robert
        $this->expr1 = $expr1;
        //John
        $this->expr2 = $expr2;
    }

    function interpret($context)
    {
        return $this->expr1->interpret($context) || $this->expr2->interpret($context);
    }
}

class AndExpression implements Expression
{
    public $expr1;
    public $expr2;

    public function __construct(Expression $expr1, Expression $expr2)
    {
        //Robert
        $this->expr1 = $expr1;
        //John
        $this->expr2 = $expr2;
    }

    function interpret($context)
    {
        return $this->expr1->interpret($context) && $this->expr2->interpret($context);
    }
}

$robert = new TerminalExpression("Robert");
$john = new TerminalExpression("John");
$or = new OrExpression($robert, $john);
var_dump($or->interpret("John"));//true
$and = new AndExpression($robert, $john);
var_dump($and->interpret("John"));//false
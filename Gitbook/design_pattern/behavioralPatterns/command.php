<?php

/**
 * Command pattern is a data driven design pattern
 * A request is wrapped(包装) under an object as command and passed to invoker(调用) object.
 * Invoker object looks for the appropriate(适当) object which can handle this command and passes the command to the corresponding(相应) object which executes the command.
 * 把对象包装起来传给执行的对象像命令一样的执行，命令对象可以把行动(action) 及其参数封装起来，于是这些行动可以被重复多次,取消（如果该对象有实现的话),取消后又再重做
 */
interface Order
{
    function execute();
}

class BuyStock implements Order
{
    public $stock;

    public function __construct(Stock $stock)
    {
        $this->stock = $stock;
    }

    function execute()
    {
        $this->stock->buy();
    }
}

class SellStock implements Order
{
    public $stock;

    public function __construct(Stock $stock)
    {
        $this->stock = $stock;
    }

    function execute()
    {
        $this->stock->sell();
    }
}

//股票
class Stock
{
    function buy()
    {
        echo __FUNCTION__ . "\n";
    }

    function sell()
    {
        echo __FUNCTION__ . "\n";
    }
}

//代理商
class Broker
{
    public $list = array();

    function takeOrder(Order $order)
    {
        array_push($this->list, $order);
    }

    function placeOrder()
    {
        foreach ($this->list as $v) {
            $v->execute();
        }
    }
}

$broker = new Broker();
$stock = new Stock();
$buyStock = new BuyStock($stock);
$sellStock = new SellStock($stock);
$broker->takeOrder($buyStock);
$broker->takeOrder($buyStock);
$broker->takeOrder($sellStock);
$broker->placeOrder();



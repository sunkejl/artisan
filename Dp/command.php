<?php

/**
 * Command pattern is a data driven design pattern
 * A request is wrapped under an object as command and passed to invoker object.
 * Invoker object looks for the appropriate object which can handle this command and passes the command to the corresponding object which executes the command.
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



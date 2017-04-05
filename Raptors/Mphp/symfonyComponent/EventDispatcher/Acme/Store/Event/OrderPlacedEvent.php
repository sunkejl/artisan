<?php
namespace Acme\Store\Event;

use Symfony\Component\EventDispatcher\Event;
use Acme\Store\Order;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/2
 * Time: 14:51
 */
class OrderPlacedEvent extends Event
{
    const NAME = 'order.placed';

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getOrder()
    {
        echo "get order";
        return $this->order;
    }

}
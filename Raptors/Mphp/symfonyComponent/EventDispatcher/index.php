<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/2
 * Time: 14:33
 */
include "vendor/autoload.php";

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;

use Acme\Store\Order;
use Acme\Store\Event\OrderPlacedEvent;

//创建分发器
$dispatcher = new EventDispatcher();
//添加一个监听器
//addListener()方法把将response事件和一个php回调函数联系在了一起。
//事件的名字必须跟dispatch()方法里提到的事件名字一样。
$dispatcher->addListener('order.placed', function (OrderPlacedEvent $event) {
    $event->getOrder();
});


// the order is somehow created or retrieved
$order = new Order;
// ...

// create the OrderPlacedEvent and dispatch it
$event = new OrderPlacedEvent($order);
$dispatcher->dispatch(OrderPlacedEvent::NAME, $event);

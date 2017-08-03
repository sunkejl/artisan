<?php
/**
 * Mediator(中间人)
 * 中间对象处理不同对象间的方法，使达到松散偶合。当某些对象之间的作用发生改变时，不会立即影响其他的一些对象之间的作用，保证这些作用可以彼此独立的变化。
 * Mediator pattern is used to reduce communication complexity between multiple objects or classes.
 * This pattern provides a mediator class which normally handles all the communications between different classes and supports easy maintenance of the code by loose coupling.
 */

namespace Dp\mediator;

class ChatRoom
{
    public function showMessage(User $user, $message)
    {
        return $user->getName() . $message."\n";
    }
}

class User
{
    public $name;

    public function __construct($name)
    {
        $this->setName($name);
    }


    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    function sendMessage($message)
    {
        echo (new ChatRoom())->showMessage($this, $message);
    }
}

$foo = new User("foo");
$bar = new User("bar");
$foo->sendMessage("123");
$bar->sendMessage("22");

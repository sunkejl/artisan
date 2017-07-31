<?php
/**
 * Mediator(中间人)
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

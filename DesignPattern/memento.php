<?php

/**
 * Memento(备忘录)
 * Originator(鼻祖)
 * Class Memento
 * 备忘录对象是一个用来存储另外一个对象内部状态的快照的对象。备忘录模式的用意是在不破坏封装的条件下，将一个对象的状态捉住，并外部化，存储起来，从而可以在将来合适的时候把这个对象还原到存储起来的状态。
 * Memento pattern is used to restore state of an object to a previous state
 */
class Memento
{
    public $state;

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }


}

class Originator
{
    public $state;

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    public function saveStateToMemento()
    {
        $memento = new Memento();
        $memento->setState($this->state);
        return $memento;
    }

    public function getStateFromMemento(Memento $memento)
    {
        return $memento->getState();
    }
}

class CareTaker
{
    public $list = array();

    public function add(Memento $memento)
    {
        array_push($this->list, $memento);
    }

    public function get()
    {
        return $this->list;
    }
}

$foo = new Originator();
$careTaker = new CareTaker();
$foo->setState(123);
$careTaker->add($foo->saveStateToMemento());
$foo->setState(234);
$careTaker->add($foo->saveStateToMemento());
var_dump($careTaker->get());









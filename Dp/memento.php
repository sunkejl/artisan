<?php

/**
 * Memento(备忘录)
 * Originator(鼻祖)
 * Class Memento
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









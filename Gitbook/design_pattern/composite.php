<?php
/**
 * composes(组合)
 * Composite pattern is used where we need to treat a group of objects in similar way as a single object.
 * this pattern creates a tree structure of group of objects.
 */
$array = array_unique($array);
$key = array_search('green', $array);

class Employee
{
    private $name;
    private $age;
    private $list = array();

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
        array_push($this->list, $this);
    }

    public function add(Employee $e)
    {
        if (array_search($e, $this->list)) {
            return $this;
        }
        array_push($this->list, $e);
        return $this;
    }

    public function remove(Employee $e)
    {
        #$this->list = array_map("unserialize", array_unique(array_map("serialize", $this->list)));
        $key = array_search($e, $this->list);
        unset($this->list[$key]);
        return $this->list = array_values($this->list);
    }

    public function get()
    {
        return $this->list;
    }
}

$ceo = new Employee("ceo", 12);
$hr = new Employee("hr", 24);
$cfo = new Employee("cfo", 24);
$ceo->add($hr)->add($cfo)->add($cfo);
var_dump($ceo->get());
var_dump($ceo->remove($cfo));
var_dump($ceo->remove($hr));
var_dump($ceo->remove($ceo));

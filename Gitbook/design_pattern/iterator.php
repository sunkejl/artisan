<?php

namespace Dp\iterator;

interface Container
{
    function getIterator();
}

class NameRepository implements Container
{
    public $data = array("1", "2", "3");

    function getIterator()
    {
        return new NameIterator($this);
    }
}

interface Iterator
{
    function next();
}

class NameIterator implements Iterator
{
    public $data;
    public $index = 0;

    public function __construct($repository)
    {
        $this->data = $repository->data;
    }

    function next()
    {
        if ($this->index < count($this->data)) {
            return $this->data[$this->index++];
        }
        return false;
    }
}

$n = new NameIterator(new NameRepository());
var_dump($n->next());
var_dump($n->next());
var_dump($n->next());
var_dump($n->next());
var_dump($n->next());

<?php

class I implements Iterator
{
    /**
     * Return the current element
     */
    public function current()
    {
        return 1;
    }

    /**
     * Move forward to next element
     */
    public function next()
    {

    }

    /**
     * Return the key of the current element
     */
    public function key()
    {
        return 1;
    }

    /**
     * Checks if current position is valid
     */
    public function valid()
    {

    }

    /**
     * Rewind the Iterator to the first element
     */
    public function rewind()
    {

    }
}

$obj = new I();
foreach ($obj as $k => $v) {
    var_dump($k);
    var_dump($v);
}

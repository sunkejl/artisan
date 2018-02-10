<?php

class P
{
    function change()
    {
        echo 123;
    }
}

class C extends P
{
    function changeOne()
    {
        parent::change();
    }
}

$c = new C();
var_dump($c->changeOne());

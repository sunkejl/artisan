<?php

class C
{
    public $name = 1;
}

$c = new C();
$c->name = 2;
$d = $c;
$e = clone $c;
var_dump($d->name);
var_dump($e->name);

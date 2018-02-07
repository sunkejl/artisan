<?php

class C
{
    public $name = 1;
}

$c = new C();
$c->name = 2;
$d = $c;//引用c
$e = clone $c;//复制c
$d->name = 4;
var_dump($d->name);
$e->name = 3;
var_dump($e->name);
var_dump($c->name);

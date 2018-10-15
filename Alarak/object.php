<?php

class P
{
    private function getName()
    {
        return 1;
    }
}

class C extends P
{
    public function getName()
    {
        return 2;
    }
}

$c = new C();
var_dump($c->getName());

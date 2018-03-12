<?php
class F{
    public $name;
}
class P{
    public $f;
    public function __construct($f)
    {
        $this->f=$f;
    }
}
$f=new F();
$p=new P($f);
$f->name=123;
var_dump($p->f->name);

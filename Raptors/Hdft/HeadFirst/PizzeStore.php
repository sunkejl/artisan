<?php

/**
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/8/21
 * Time: 23:01
 */
abstract class PizzaStore
{
    private $style;

    /**
     * PizzaStore constructor.
     */
    public function __construct($style)
    {
        $this->style = $style;
    }

    public function orderPizza()
    {
        var_dump("order pizza style = $this->style");
        return true;
    }

    abstract function createPizza();
}

class NYPizzaStore extends PizzaStore
{
    /**
     * @var
     */
    private $style;

    public function __construct($style)
    {
        $this->style = $style;
        parent::__construct($style);
    }


    function createPizza()
    {
        switch ($this->style) {
            case "cheese":
                return new NYCheesePizza();
            case "clam":
                return new NYClamPizza();
        }
    }
}

abstract class Pizza
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function prepare(){
        var_dump("prepare $this->name");
        return true;
    }
}

class NYCheesePizza extends Pizza
{
    private $name = "NY cheese Pizza";

    /**
     * NYCheesePizza constructor.
     */
    public function __construct()
    {
        parent::__construct($this->name);
    }
}

class NYClamPizza extends Pizza
{
    private $name = "NY clam Pizza";

    /**
     * NYCheesePizza constructor.
     */
    public function __construct()
    {
        parent::__construct($this->name);
    }
}

 (new NYPizzaStore("cheese"))->orderPizza();
$pizza=((new NYPizzaStore("cheese"))->createPizza());
$pizza->prepare();


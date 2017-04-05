<?php
namespace PizzaIngredientFactory;

    /**
     * 抽象工厂模式 提供一个接口 用于创建相关或依赖对象的家族 而不需要明确指定具体类
     * Created by PhpStorm.
     * User: sk
     * Date: 2016/8/29
     * Time: 22:13
     */

#抽象工厂
interface PizzaIngredientFactory
{
    public function createDough();

    public function createSauce();

    public function createCheese();

    public function createVeggies();

    public function createPepperoni();

    public function createClam();
}

class NYPizzaIngredientFactory implements PizzaIngredientFactory
{
    public function createCheese()
    {
        // TODO: Implement createCheese() method.
    }

    public function createClam()
    {
        // TODO: Implement createClam() method.
    }

    public function createDough()
    {
        var_dump("ny factory");
        // TODO: Implement createDough() method.
    }

    public function createPepperoni()
    {
        // TODO: Implement createPepperoni() method.
    }

    public function createSauce()
    {
        // TODO: Implement createSauce() method.
    }

    public function createVeggies()
    {
        // TODO: Implement createVeggies() method.
    }

}

#抽象的pizza
abstract class Pizza
{
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    abstract function prepare(PizzaIngredientFactory $ingredientFactory);
}

class CheesePizza extends Pizza
{
    function prepare(PizzaIngredientFactory $ingredientFactory)
    {
        $dough = $ingredientFactory->createDough();
        // TODO: Implement prepare() method.
    }
}

class CLamPizza extends Pizza
{
    function prepare(PizzaIngredientFactory $ingredientFactory)
    {
        $dough = $ingredientFactory->createDough();
        // TODO: Implement prepare() method.
    }

}

class NYPizzaStore
{
    private $ingredientFactory;

    public function __construct(PizzaIngredientFactory $ingredientFactory)
    {
        $this->ingredientFactory = $ingredientFactory;
    }


    function createPizza($item)
    {
        if ($item == "cheese") {
            $pizza = new CheesePizza($this->ingredientFactory);
            $pizza->setName("new york style cheese pizza");
        } elseif ($item == "clam") {
            $pizza = new CLamPizza($this->ingredientFactory);
            $pizza->setName("new york style clam pizza");
        } else {
            $pizza = false;
        }

        return $pizza;
    }
}

$nyPizzaStore = new NYPizzaStore(new NYPizzaIngredientFactory());
$nyPizza = $nyPizzaStore->createPizza("cheese");
$nyPizza->prepare(new NYPizzaIngredientFactory());

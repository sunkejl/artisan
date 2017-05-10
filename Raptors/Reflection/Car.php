<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/10
 * Time: 14:36
 */
class Car
{
    /**
     * @var name
     */
    public $name;

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

}

$car=new ReflectionClass("Car");
$properties = $car->getProperties();
foreach($properties as $property) {
    echo $property->getName()."\n";
    echo  $property->getDocComment()."\n";
}
$methods=$car->getMethods();
foreach ($methods as $method){
    echo $method->getName()."\n";
}
var_dump($car->getMethod("setName"));

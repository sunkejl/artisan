<?php
/**
 * 通过提供默认对象来避免空引用。
 * a null object replaces check of NULL object instance.
 * Instead of putting if check for a null value, Null Object reflects a do nothing relationship
 */

namespace Dp\nullObject;

abstract class Customer
{
    public $name;

    abstract function isNull();

    abstract function getName();
}

class RealCustomer extends Customer
{
    public function __construct($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
    }

    function isNull()
    {
        return false;
    }
}

class NullCustomer extends Customer
{
    public function __construct()
    {
        $this->name = "empty";
    }

    function getName()
    {
        return $this->name;
    }

    function isNull()
    {
        return true;
    }
}

class CustomerFactory
{
    public $name = [1, 2, 3];

    public function getCustomer($name)
    {
        if (in_array($name, $this->name)) {
            return new RealCustomer($name);
        }
        return new NullCustomer();
    }
}

$customer1 = (new CustomerFactory())->getCustomer(1)->getName();
$customer2 = (new CustomerFactory())->getCustomer(4)->getName();
var_dump($customer1);
var_dump($customer2);

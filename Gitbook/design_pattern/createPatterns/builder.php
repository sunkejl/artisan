<?php

namespace build;
class Director
{
	function build(Builder $builder)
	{
		return $builder->getProduct();
	}
}

abstract class Builder
{
	abstract function builderA();

	abstract function builderB();

	abstract function getProduct();
}

class BuilderBar extends Builder
{
	public $product;
	public function __construct()
	{
		$this->product=new Product();
	}

	function builderA()
	{
		$this->product->add("bar_a");
	}

	function builderB()
	{
		$this->product->add("bar_b");
	}

	function getProduct()
	{
		return $this->product;
	}

}

class BuilderFoo extends Builder
{
	public $product;
	public function __construct()
	{
		$this->product=new Product();
	}


	function builderA()
	{
		$this->product->add("foo_a");
	}

	function builderB()
	{
		$this->product->add("foo_b");
	}

	function getProduct()
	{
		return $this->product;
	}

}

class Product
{
	public $products = [];

	function add($product)
	{
		array_push($this->products, $product);
	}
}

$builder=new BuilderBar();
$builder->builderA();
$builder->builderB();
$product = (new Director())->build($builder);
var_dump($product);

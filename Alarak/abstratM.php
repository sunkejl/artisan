<?php

/**
 * Interface I
 */
interface I
{
	const A = 1;

	function d();
}

abstract class A implements I
{
	abstract function getA();

	function c()
	{
		echo 123;
	}
}

class B extends A implements I
{
	function d()
	{
	}

	function getA()
	{
		parent::c();
	}
}

$b = new B();
$b->getA();
var_dump(I::A);
var_dump(B::A);
var_dump(intval("a--1"));
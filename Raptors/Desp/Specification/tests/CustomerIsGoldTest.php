<?php

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/6
     * Time: 15:40
     */
    class CustomerIsGoldTest extends PHPUnit_Framework_TestCase
    {

        /** @test * */
        function is_gold()
        {
            $specification = new  CustomerIsGold;
            $goldCustomer = new Customer("gold");
            $sliverCustomer = new Customer("sliver");
            $this->assertTrue($specification->isSatisfiedBy($goldCustomer));
            $this->assertFalse($specification->isSatisfiedBy($sliverCustomer));
        }
    }
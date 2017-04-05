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
            $goldCustomer = new Customer(['type' => 'gold']);
            $test = new Customer(['name1' => 'jane']);
            $sliverCustomer = new Customer(['type' => "sliver123"]);
            $this->assertTrue($specification->isSatisfiedBy($goldCustomer));
            $this->assertFalse($specification->isSatisfiedBy($sliverCustomer));
        }
    }
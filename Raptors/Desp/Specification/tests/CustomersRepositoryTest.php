<?php

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/7
     * Time: 10:45
     */
    class CustomersRepositoryTest extends PHPUnit_Framework_TestCase
    {

        protected $customers;

        public function setUp()
        {
            $this->customers = new CustomerRepository(
                [
                    new Customer('gold'),
                    new Customer('bronze'),
                    new Customer('silver'),
                    new Customer('gold')
                ]
            );
        }

        /** @test * */
        function fetches_all_b()
        {
            $results = $this->customers->all();
            $this->assertCount(4, $results);
        }

        /** @test * */
        function fetches_all()
        {
            $customers = new CustomerRepository([
                new Customer('gold'),
                new Customer('bronze'),
                new Customer('silver'),
                new Customer('gold')
            ]);
            $result=$customers->bySpecification(new CustomerIsGold);
            $this->assertCount(2,$result);
        }
    }
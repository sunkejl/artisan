<?php

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/7
     * Time: 10:51
     */
    class CustomerRepository
    {

        protected $customers;

        public function __construct(array $customers)
        {
            $this->customers = $customers;
        }

        public function bySpecification($specification)
        {
            $matches = [];
            foreach ($this->customers as $customer) {
                if ($specification->isSatisfiedBy($customer)) {
                    $matches[] = $customer;
                }
            }

            return $matches;
        }

        public function all()
        {
            return $this->customers;
        }
    }
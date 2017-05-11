<?php

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/7
     * Time: 10:51
     */
    class CustomerRepository
    {

        public function bySpecification($specification)
        {
            $customers = Customer::query();
            $customers = $specification->asScope($customers);

            return $customers->get();
        }

        public function all()
        {
            return Customer::all();
        }
    }
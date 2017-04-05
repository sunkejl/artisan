<?php

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/6
     * Time: 15:43
     */
    class CustomerIsGold
    {

        public function isSatisfiedBy(Customer $customer)
        {
            return $customer->type() == "gold";
        }

        public function asScope($query){
            return $query->where('type','gold');
        }
    }
<?php

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/6
     * Time: 15:43
     */
    class Customer
    {

        protected $type;

        public function __construct($type)
        {
            $this->type = $type;
        }

        public function type()
        {
            return $this->type;
        }
    }
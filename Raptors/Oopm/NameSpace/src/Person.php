<?php namespace Acme;

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/11
     * Time: 16:03
     */
    class Person
    {

        protected $name;

        public function __construct($name)
        {
            $this->name = $name;
        }


    }
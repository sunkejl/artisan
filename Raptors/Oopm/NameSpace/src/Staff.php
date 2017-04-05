<?php namespace Acme;

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/11
     * Time: 16:05
     */
    class Staff
    {

        protected $members = [];

        public function __construct($members = [])
        {
            $this->members = $members;
        }


        public function add(Person $person)
        {
            $this->members[] = $person;
        }

        public function members()
        {
            return $this->members;
        }
    }
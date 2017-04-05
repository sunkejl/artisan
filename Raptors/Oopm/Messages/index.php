<?php

    /**
     * The key to OOP  objects send messages to one another
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/11
     * Time: 15:15
     */
    class Person
    {

        protected $name;

        public function __construct($name)
        {
            $this->name = $name;
        }

    }

    class Business
    {

        protected $staff;

        public function __construct(Staff $staff)
        {
            $this->staff = $staff;
        }


        public function hire(Person $person)
        {
            $this->staff->add($person);
        }

        public function getStaffMembers()
        {

            return $this->staff->members();
        }

    }

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

    $jack = new Person("jack");
    $staff = new Staff([$jack]);
    $chh = new Business($staff);
    $chh->hire(new Person("rose"));
    var_dump($chh->getStaffMembers());
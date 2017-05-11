<?php namespace Acme;

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/11
     * Time: 16:04
     */
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
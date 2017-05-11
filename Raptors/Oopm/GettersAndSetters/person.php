<?php

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/11
     * Time: 13:55
     */
    class Person
    {

        private $age;

        /**
         * @return mixed
         */
        public function getAge()
        {
            return $this->age;
        }

        /**
         * @param mixed $age
         */
        public function setAge($age)
        {
            if ($age < 0) {
                throw new Exception("error age");
            }
            $this->age = $age;
        }
    }
    #取类属性的时候，防止直接给属性赋值
    $person = new Person();
    $person->setAge(-1);
    var_dump($person->getAge());
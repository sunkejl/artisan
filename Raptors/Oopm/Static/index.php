<?php

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/11
     * Time: 17:13
     */
    class Person
    {

        public static $age = 1;#看到静态方法 要想到share

        const AGE = 2;

        public function addBirthday()
        {
            static::$age += 1;
        }
    }

    var_dump(Person::AGE);#2
    $s = new Person();
    $s->addBirthday();
    var_dump(Person::$age);#2
    $k = new Person();
    $k->addBirthday();
    var_dump(Person::$age);#3

    class PersonA
    {

        public $age = 1;

        public function addBirthday()
        {
            $this->age += 1;
        }
    }

    $s = new PersonA();
    $s->addBirthday();
    var_dump($s->age);#2
    $k = new PersonA();
    $k->addBirthday();
    var_dump($s->age);#2
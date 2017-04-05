<?php

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/18
     * Time: 20:04
     */
    class Weight
    {

        protected $weight;

        /**
         * Weight constructor.
         */
        public function __construct($weight)
        {
            $this->weight = $weight;
        }

        public function gain($pounds)
        {
            return new static($this->weight + $pounds);  #是当前实例化的那个类
        }

    }

    class WorkOut
    {

        protected $name;
        protected $weight;

        /**
         * WorkOut constructor.
         */
        public function __construct($name, Weight $weight)
        {
            $this->name = $name;
            $this->weight = $weight;
        }

        public function getResult()
        {
            return $this->weight->gain(20);
        }
    }

    $foo = new WorkOut("sk", new Weight(15));  #如果单传15 不易理解
    var_dump($foo->getResult());

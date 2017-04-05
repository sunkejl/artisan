<?php

    /**
     * 装饰
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/5
     * Time: 10:19
     */
    interface CarService
    {

        public function getCost();

        public function getDescription();
    }

    class BasicInspection implements CarService
    {

        public function getCost()
        {
            return 10;
        }

        public function getDescription()
        {
            return "basic";
        }


    }

    class OilChange implements CarService
    {

        protected $carService;

        public function __construct(CarService $carService)
        {
            $this->carService = $carService;
        }

        public function getCost()
        {
            return 1 + $this->carService->getCost();
        }

        public function getDescription()
        {
            return $this->carService->getDescription() . "oil";
        }

    }

    class TireRotation implements CarService
    {

        protected $carService;

        public function __construct(CarService $carService)
        {
            $this->carService = $carService;
        }

        public function getCost()
        {
            return 1 + $this->carService->getCost();
        }

        public function getDescription()
        {
            return $this->carService->getDescription() . "tire";
        }

    }

    echo (new OilChange(new BasicInspection()))->getDescription();

    //A decorator allows us to dynamically extend the behavior of a particular object at runtime, without needing to resort to unnecessary inheritance.


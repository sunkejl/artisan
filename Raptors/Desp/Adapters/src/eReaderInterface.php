<?php
    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/5
     * Time: 14:03
     */
    namespace Acme;

    interface eReaderInterface
    {

        public function turnOn();

        public function pressNextButton();
    }
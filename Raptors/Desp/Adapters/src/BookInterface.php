<?php
    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/5
     * Time: 13:59
     */
    namespace Acme;

    interface BookInterface
    {

        public function open();

        public function turnPage();
    }
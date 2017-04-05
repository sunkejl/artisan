<?php
    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/5
     * Time: 14:02
     */

    namespace Acme;


    class Kindle implements eReaderInterface
    {

        public function turnOn()
        {
            var_dump("turnOn the Kindle");
        }

        public function pressNextButton()
        {
            var_dump("press the button");
        }

    }
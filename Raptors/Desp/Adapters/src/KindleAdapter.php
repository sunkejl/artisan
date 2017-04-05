<?php
    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/5
     * Time: 14:07
     */

    namespace Acme;


    class KindleAdapter implements BookInterface
    {

        private $kindle;

        public function __construct(Kindle $kindle)
        {
            $this->kindle = $kindle;
        }


        public function turnPage()
        {
            return $this->kindle->turnOn();
        }

        public function open()
        {
            return $this->kindle->pressNextButton();
        }
    }
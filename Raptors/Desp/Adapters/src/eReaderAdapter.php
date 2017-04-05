<?php
    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/5
     * Time: 14:07
     */

    namespace Acme;


    class eReaderAdapter implements BookInterface
    {

        private $reader;

        public function __construct(eReaderInterface $reader)
        {
            $this->reader= $reader;
        }


        public function turnPage()
        {
            return $this->reader->turnOn();
        }

        public function open()
        {
            return $this->reader->pressNextButton();
        }
    }
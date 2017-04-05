<?php
    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/5
     * Time: 13:45
     */

    namespace Acme;


    class Book implements BookInterface
    {

        public function open()
        {
            var_dump("open the book1");
        }

        public function turnPage()
        {
            var_dump("turning the page of the paper book");
        }
    }
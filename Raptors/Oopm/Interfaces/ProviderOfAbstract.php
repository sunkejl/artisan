<?php

    /**
     * Interface只能写public方法不能写函数内容，Abstract类里不是abstract方法可以定义函数内容，
     * 一个类可以实现多个interface,只能继承一个abstract类
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/12
     * Time: 14:36
     */
    abstract class Provider
    {

       abstract protected function bar();
    }


    class fbProvider extends Provider
    {

        protected function bar()
        {
            // TODO: Implement bar() method.
        }
    }


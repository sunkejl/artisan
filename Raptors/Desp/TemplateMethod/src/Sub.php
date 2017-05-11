<?php
    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/5
     * Time: 15:37
     */

    namespace App;


    abstract class Sub
    {

        public function make()
        {
            return $this
                ->layBread()
                ->addLettuce()
                ->addPrimaryToppings()
                ->addSauces();
        }

        public function layBread()
        {
            var_dump("layBread");

            return $this;
        }

        public function addLettuce()
        {
            var_dump("addLettuce");

            return $this;
        }

        public function addSauces()
        {
            var_dump("addSauces");

            return $this;
        }

        protected abstract function addPrimaryToppings();

        //PHP 5 支持抽象类和抽象方法。定义为抽象的类不能被实例化。任何一个类，
        //如果它里面至少有一个方法是被声明为抽象的，那么这个类就必须被声明为抽象的。
        //被定义为抽象的方法只是声明了其调用方式（参数），不能定义其具体的功能实现。

        //继承一个抽象类的时候，子类必须定义父类中的所有抽象方法；
        //另外，这些方法的访问控制必须和父类中一样（或者更为宽松）。
        //例如某个抽象方法被声明为受保护的，那么子类中实现的方法就应该声明为受保护的或者公有的，而不能定义为私有的。
        //此外方法的调用方式必须匹配，即类型和所需参数数量必须一致。
        //例如，子类定义了一个可选参数，而父类抽象方法的声明里没有，则两者的声明并无冲突。

    }
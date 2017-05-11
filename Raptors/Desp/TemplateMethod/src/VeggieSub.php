<?php namespace App;

/**
 * Created by PhpStorm.
 * User: sunke
 * Date: 2016/7/5
 * Time: 15:22
 */
class VeggieSub extends Sub
{

    public function addPrimaryToppings()
    {
        var_dump("addViggle");

        return $this;
    }

}
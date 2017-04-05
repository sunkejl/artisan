<?php namespace App;

/**
 * Created by PhpStorm.
 * User: sunke
 * Date: 2016/7/5
 * Time: 15:22
 */
class TurkeySub extends Sub
{


    public function addPrimaryToppings()
    {
        var_dump("addTurkey");

        return $this;
    }

}
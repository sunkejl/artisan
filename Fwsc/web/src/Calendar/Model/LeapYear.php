<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/23
 * Time: 18:24
 */
namespace Calendar\Model;

class LeapYear
{
    public function isLeapYear($year = null)
    {
        if (null === $year) {
            $year = date('Y');
        }

        return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
    }

}
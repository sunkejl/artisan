<?php
    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/12
     * Time: 17:30
     */
    function myfunction($v)
    {
        return ($v * $v);
    }

    $a = array ('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
    print_r(array_map("myfunction", $a));


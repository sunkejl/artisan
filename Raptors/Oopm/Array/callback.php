<?php
    /**
     * 回调函数
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/15
     * Time: 13:33
     */

    function bar($type)
    {
        echo $type;
    }
    call_user_func("bar","world");
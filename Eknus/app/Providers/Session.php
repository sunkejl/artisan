<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 17:58
 */

namespace App\Providers;


class Session
{
    public function getManager(){
       $session =new \Symfony\Component\HttpFoundation\Session\Session();
        return $session;
    }
}
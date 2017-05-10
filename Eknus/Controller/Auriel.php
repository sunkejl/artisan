<?php

namespace Ek\Controller;

use Ek\Lib\Db;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/5
 * Time: 15:04
 */
class Auriel extends Controller
{
    public function indexAction(Request $request)
    {
        $this->getsSession()->getManager()->set("a",1133);
        var_dump($this->getsSession()->getManager()->get("a"));
        $this->log()->writeLog()->error(222);
        $this->log()->writeLog()->warning(222);
        return $this->render("index.html.twig",array("name"=>"sk"));
    }
}

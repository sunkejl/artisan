<?php

namespace App\Http\Controllers;

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
        $client=$this->getRedis()->getManager();
        $client->select(15);
        $client->set('foo', 'bar');
        $value = $client->get('foo');
        var_dump($value);

        $this->getsSession()->getManager()->set("a", 1133);
        var_dump($this->getsSession()->getManager()->get("a"));
        $this->getLog()->writeLog()->error(222);
        $this->getLog()->writeLog()->warning(222);
        return $this->render("index.html.twig", array("name" => "sk"));
    }

    public function mailAction()
    {
        $this->getMail()->set();
    }
}

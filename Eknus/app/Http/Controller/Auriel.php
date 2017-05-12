<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\TokenStorage\NativeSessionTokenStorage;


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
        return $this->render("index.html.twig", array("name" => "sk"));
    }

    public function setLog()
    {
        $this->getLog()->writeLog()->error(222);
        $this->getLog()->writeLog()->warning(222);
        exit;
    }

    public function getSession()
    {
        $this->getsSession()->getManager()->set("a", 1133);
        var_dump($this->getsSession()->getManager()->get("a"));
        exit;
    }

    public function setRedisAction()
    {
        $client = $this->getRedis()->getManager();
        $client->select(15);
        $client->set('foo', 'bar');
        $value = $client->get('foo');
        var_dump($value);
        exit;
    }

    public function setCsrfAction()
    {
        $c = $this->getCsrf()->getToken("authenticate");
        var_dump($c);
        $v = $this->getCsrf()->isTokenValid("authenticate", $c);
        var_dump($v);
        exit;
    }

    public function mailAction()
    {
        $this->getMail()->set();
    }
}

<?php

namespace Ek\Controller;

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
        return $this->render("index.html.twig",array("go"=>"to"));
        exit;
        $response = new Response();
        $response->setContent("aaa");
        return $response;
    }
}

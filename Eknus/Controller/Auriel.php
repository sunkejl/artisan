<?php

namespace Ek\Controller;

use Ek\Model\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/5
 * Time: 15:04
 */
class Auriel
{
    public function indexAction(Request $request)
    {
        $response = new Response();
        $response->setContent("aaa");
        return $response;
    }
}

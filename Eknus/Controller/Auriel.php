<?php
namespace Ek\Controller;
use Symfony\Component\HttpFoundation\Response;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/5
 * Time: 15:04
 */
class Auriel
{
    public function indexAction()
    {
        $response = new Response();
        $response->setContent("aaa");
        return $response;
    }
}

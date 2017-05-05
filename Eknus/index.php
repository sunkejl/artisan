<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/5
 * Time: 14:43
 */
date_default_timezone_set('Asia/Shanghai');
ini_set('display_errors',true);
error_reporting(E_ALL);

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "vendor/autoload.php";
$a=new \Ek\Controller\Auriel();
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

$request = Request::createFromGlobals();
$routes = include "route.php";

$requestContext= new Routing\RequestContext();
$requestContext->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes,$requestContext);


$pathInfo=$matcher->match($request->getPathInfo());
$__route=$pathInfo['_route'];
$name=$pathInfo['name'];
//include sprintf(__DIR__."/Controller/%s.php",$__route);
//$app=new IndexController();
$request->attributes->add($pathInfo);

$response=call_user_func(array($request->attributes->get('_controller'), 'indexAction'));
$response->send();
exit;
#$response = call_user_func(array($request->attributes->get('_controller'),'indexAction', $request);
$response->send();


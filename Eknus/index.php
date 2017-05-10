<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/5
 * Time: 14:43
 */
date_default_timezone_set('Asia/Shanghai');
ini_set('display_errors', true);
error_reporting(E_ALL);

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "vendor/autoload.php";
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$request = Request::createFromGlobals();

$routes = include "route.php";

$requestContext = new Routing\RequestContext();
$requestContext->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $requestContext);


$pathInfo = $matcher->match($request->getPathInfo());
$__route = $pathInfo['_route'];
$name = $pathInfo['name'];
//include sprintf(__DIR__."/Controller/%s.php",$__route);
//$app=new IndexController();
$request->attributes->add($pathInfo);


//HttpKernel 获取controller和参数
$resolver = new \Symfony\Component\HttpKernel\Controller\ControllerResolver();
$controller = $resolver->getController($request);
$arguments = $resolver->getArguments($request, $controller);#获取类中方法的参数
$response = call_user_func($controller,$request);

//旧的写法
//$response = call_user_func(array($request->attributes->get('_controller'), 'indexAction'),$request);
#可以考虑把 '_controller' => new \Ek\Controller\Auriel(), 改成'_controller' => array(new Controller(), 'indexAction'),缺点:class is always instantiated


$response->send();


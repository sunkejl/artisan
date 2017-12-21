<?php
/**
 * 增加 /src/simplex 增加unit test
 * 增加事件监听和Cache
 * todo #11
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/10/1
 * Time: 22:54
 */
ini_set('display_errors',true);
error_reporting(E_ALL);
// example.com/web/front.php
require 'vendor/autoload.php';


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;
//“控制器分析器（controller resolver）”。根据传过来的请求对象，controller resolver知道那一个控制器将要被执行，以及将要传给它什么参数。
use Symfony\Component\HttpKernel;
//增加事件监听
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\HttpCache\HttpCache;
use Symfony\Component\HttpKernel\HttpCache\Store;


$request = Request::createFromGlobals();
$routes = include __DIR__.'/src/app.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
$resolver = new HttpKernel\Controller\ControllerResolver();



$dispatcher = new EventDispatcher();
$dispatcher->addSubscriber(new HttpKernel\EventListener\RouterListener($matcher));#事件的订阅#9
$dispatcher->addListener('response', array(new Simplex\ContentLengthListener(), 'onResponse'), -255);#时间的监听#9 低优先级的监听控件设置优先级为负数  -255，表示最后执行
$dispatcher->addSubscriber(new Simplex\GoogleListener());
$dispatcher->addListener('responseT', function (Simplex\ResponseEvent $event) {
    $response = $event->getResponse();
    $response->setContent($response->getContent() . '\\nADD_T');
});

$framework = new Simplex\Framework($dispatcher, $matcher, $resolver);
$framework = new HttpCache($framework, new Store(__DIR__ . '/cache'));

$response = $framework->handle($request);
$response->send();


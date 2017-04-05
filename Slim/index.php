<?php
require '../vendor/autoload.php';

//自动加载
spl_autoload_register(function ($classname) {
    require(__DIR__ . "/classes/" . $classname . ".php");
});
$num = new Bar();

//容器
$container = new \Slim\Container;
$app = new \Slim\App($container);
$container = $app->getContainer();
$container['myService'] = function ($container) {
    $myService = "name of container";
    return $myService;
};

//中间件middleware
$app->add(function ($request, $response, $next) {
    $response->getBody()->write('BEFORE');
    $response = $next($request, $response);
    $response->getBody()->write('AFTER');

    return $response;
});

$app->get('/hello/{name}', function ($request, $response, $args) {
    return $response->write("Hello, " . $args['name']);
});

$app->get('/contain/{name}', function ($request, $response, $args) {
    $myService = $this->get('myService');
    var_dump($myService);
    exit;
});

$app->run();
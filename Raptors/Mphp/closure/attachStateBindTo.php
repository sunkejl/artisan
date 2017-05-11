<?php

/**
 * 常见框架路由用回调函数的实现 在参数传递时传入匿名函数
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/14
 * Time: 16:24
 */
class App
{
    protected $routes = [];
    protected $responseStatus = '200 OK';
    protected $responseContentType = 'text/html';
    protected $responseBody = 'Hello world';

    public function addRoute($routePath, $routeCallback)
    {
        $this->routes[$routePath] = $routeCallback->bindTo($this, __CLASS__);#绑定的对象和绑定的类作用域
    }

    public function dispatch($currentPath)
    {
        foreach ($this->routes as $route => $callback) {
            if ($route == $currentPath) {
                $callback();#执行回调函数
            }
        }
        header('HTTP/1.1 ' . $this->responseStatus);
        header('Content-type: ' . $this->responseContentType);
        header('Content-length: ' . mb_strlen($this->responseBody));
        echo $this->responseBody;
    }
}

$app = new App();
$app->addRoute('/users/josh', function () {
    $this->responseContentType = 'application/json;charset=utf8';
    $this->responseBody = '{"name": "Josh"}';
});
$app->dispatch('/users/josh');

<?php

/**
 * @link http://symfony.com/doc/current/components/http_foundation.html
 *
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/2
 * Time: 18:39
 */
include "vendor/autoload.php";
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$request = Request::create("/index.php?bar=123", "post", ["a" => "a", "b" => "b"], ["cook" => "cookie_01"]);
$bar = $request->query->get('bar', 'baz');
$query = $request->query->get("a");
$pathInfo = $request->getPathInfo();
$httpHost = $request->server->get('HTTP_HOST');
$cookie = $request->cookies->get("cook");
$method = $request->getMethod();
var_dump(compact("bar", "pathInfo", "httpHost", "method", "cookie","query"));

$response = new \Symfony\Component\HttpFoundation\Response();
$response->setContent("hello world\r\n");
$response->setStatusCode(200);
$response->headers->set("Content-Type", 'text/html');
$response->send();


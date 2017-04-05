<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/5
 * Time: 14:18
 */
#header("Content-Type: text/json");
header("Content-Type: text/html");
header("Server: nginx/2017");
header("Date: 2017");
#header("Content-Length: 100");
header("X-Powered-By: JS");
header("C:2");
#echo json_encode($_REQUEST);exit;
var_dump($_REQUEST);
var_dump($_SERVER);
var_dump($_COOKIE);


#request
#Raw
#POST http://hp.artisan.com/response.php HTTP/1.1
#Host: hp.artisan.com
#Connection: keep-alive
#Cache-Control: max-age=0
#User-Agent: fiddle
#Upgrade-Insecure-Requests: 1
#Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8
#Accept-Encoding: gzip, deflate, sdch
#Accept-Language: zh-CN,zh;q=0.8,en;q=0.6,zh-TW;q=0.4
#Cookie: XDEBUG_SESSION=PHPSTORM
#Content-Length: 13
#Content-Type: application/x-www-form-urlencoded
#
#id=12&name=23


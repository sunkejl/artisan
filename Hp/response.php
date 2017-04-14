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
#var_dump(setcookie("u_a_A", "2444", time()+3600000000, "/", "artisan.com",false));
setcookie("u_b", "23");
#header("Set-Cookie: name=user123");
header("Set-Cookie:u_a_A=2444; expires=Sat, 05-May-2131 02:32:44 GMT; Max-Age=3600000000; path=/; domain=artisan.com");
header("Set-Cookie:u_b=23");

var_dump($_POST);exit;
echo json_encode(file_get_contents('php://input'));exit;
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


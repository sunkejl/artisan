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



<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17
 * Time: 17:14
 */
require "vendor/autoload.php";
$response = new \Symfony\Component\HttpFoundation\Response('Oops', 400);
$response->send();

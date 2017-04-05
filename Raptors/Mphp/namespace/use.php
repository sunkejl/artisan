<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17
 * Time: 17:24
 */
require "vendor/autoload.php";
use Symfony\Component\HttpFoundation\Response;

$response = new Response("Oops", 400);
$response->send();

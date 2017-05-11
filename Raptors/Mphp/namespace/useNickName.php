<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17
 * Time: 17:26
 */
require "vendor/autoload.php";
use Symfony\Component\HttpFoundation\Response as Res;

$response = new Res("Oops", 400);
$response->send();
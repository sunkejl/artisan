<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/3
 * Time: 10:30
 */
$redis =new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->set("name","sk");
$name=$redis->get("name");
$redis->hSet("swoole","id",6379);
$arr=$redis->hGetAll("swooleId");
var_dump($arr);exit;
$id=$redis->hGet("swoole","id");
var_dump($id);
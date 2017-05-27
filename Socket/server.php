<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/27
 * Time: 15:08
 */
$ip = "127.0.0.1";
$port = "88889";
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($socket, $ip, $port);
socket_listen($socket, 5);
do {
    $client = socket_accept($socket);
    socket_write($client, "sss", 3);
    do {
        $buffer = socket_read($client, 2048, PHP_NORMAL_READ);
        socket_write($client, "ddd", 3);
    } while (true);
    socket_close($client);
} while (true);

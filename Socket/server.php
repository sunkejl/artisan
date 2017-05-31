<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/27
 * Time: 15:08
 */
$ip = "127.0.0.1";
$port = "8879";
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($socket, $ip, $port);
socket_listen($socket, 5);
do {
    $client = socket_accept($socket);
    socket_write($client, "welcome", 256);
    do {
        if(false==($buffer = socket_read($client, 255, PHP_NORMAL_READ)))
        {
            break;
        }
        socket_write($client, $buffer, 255);
        echo "receive:$buffer\n";
    } while (true);
    socket_close($client);
} while (true);

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/27
 * Time: 15:08
 */

$ip = "127.0.0.1";
$port = $argv[1];
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($socket, $ip, $port);
socket_listen($socket, 5);
do {
    echo time()."\n";
    $client = socket_accept($socket);
    $pid = pcntl_fork();
    //子进程
    if ($pid == 0) {
        socket_write($client, "welcome", 256);
        do {
            if (false == ($buffer = socket_read($client, 255, PHP_NORMAL_READ))) {
                echo "break";
                break;
            }
            socket_write($client, "server receive:" . $buffer, 255);
            echo "receive:$buffer\n";
        } while (true);
    }
} while (true);
socket_close($client);

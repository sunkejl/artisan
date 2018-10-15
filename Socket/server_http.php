<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/27
 * Time: 15:08
 */
$ip = "127.0.0.1";
$ip = "172.16.54.110";
$port = $argv[1];
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind($socket, $ip, $port);
socket_listen($socket, 5);
$file = file_get_contents("image.png");
$len = strlen($file);
$i = 0;
do {
    echo $i . "\n";
    $client = socket_accept($socket);
    $pid = pcntl_fork();
    //子进程
    #Content-Type: text/html;charset=UTF-8
    #Content-Type: image/jpg
    #Content-Type: image/png
    if ($pid == 0) {
        $html = "
HTTP/1.1 200 OK
Server: nginx
Date: Wed, 05 Jul 2017 02:40:19 GMT
Connection: keep-alive
Content-Type: image/png
Vary: Accept-Encoding
Cache-control: no-cache, must-revalidate
Expires: Sat, 26 Jul 1997 05:00:00 GMT
X-Server: msa-web-19-87-prd.vm.jh
Access-Control-Allow-Origin: *
Access-Control-Allow-Credentials: true
Access-Control-Allow-Methods: GET,POST
Content-Length:6553500

$file
";
        socket_write($client, $html, strlen($html));
        socket_close($client);
        $i++;
    }
} while (true);

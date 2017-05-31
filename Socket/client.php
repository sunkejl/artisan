<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/27
 * Time: 15:16
 */
#ctrl+d 输入EOF


$ip = "127.0.0.1";
$port = "8879";
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($socket, $ip, $port);
if (false != ($out = socket_read($socket, 255))) {
    echo "acp: $out\n";
}
while ($file = file_get_contents("php://stdin", "r")) {
    echo $file;
    socket_write($socket, $file, strlen($file));
    if (false != ($out = socket_read($socket, 255))) {
        echo "acp: $out\n";
    }
}
socket_close($socket);

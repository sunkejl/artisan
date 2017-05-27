<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/27
 * Time: 15:16
 */
#ctrl+d 输入EOF


$ip = "127.0.0.1";
$port = "10000";
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($socket, $ip, $port);
while ($file=file_get_contents("php://stdin", "r")){
    var_dump($file);
    socket_write($socket, 123, 3);
    var_dump(socket_read($socket, 2048));
//    while($out = socket_read($socket, 2048)) {
//        echo "接收服务器回传信息成功！\n";
//        echo "接收的内容为:",$out;
//    }
};

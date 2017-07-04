<?php
/**
 * ctrl+d 输入EOF
 */

/** 确保这个函数只能运行在SHELL中 */
if (substr(php_sapi_name(), 0, 3) !== 'cli') {
    die("This Program can only be run in CLI mode");
}
set_time_limit(0);

$pid = posix_getpid(); //取得主进程ID
$user = posix_getlogin(); //取得用户名
var_dump($pid);
var_dump($user);
echo <<<EOD
USAGE: [command | expression]
input php code to execute by fork a new process
input quit to exit
 
        Shell Executor version 1.0.0 by sk
EOD;


$ip = "127.0.0.1";
$port = $argv[1];
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_connect($socket, $ip, $port);
if (false != ($out = socket_read($socket, 255))) {
    echo "acp: $out\n";
}
while ($file = file_get_contents("php://stdin", "r")) {
    if ($file == "quit\n") {
        break;
    }
    echo "send:" . $file;
    socket_write($socket, $file, strlen($file));
    if (false != ($out = socket_read($socket, 255))) {
        echo "acp: $out\n";
    }
}
socket_close($socket);

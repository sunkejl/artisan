<?php
date_default_timezone_set('Asia/Shanghai');

$redis =new Redis();
$redis->connect('127.0.0.1', 6379);

$ws = new swoole_websocket_server("0.0.0.0", 9503);

$ws->on('open', function ($ws, $request)use($redis) {
   // var_dump($request->fd, $request->get, $request->server);
    //var_dump($request->server);
    $ws->push($request->fd, "hello, welcome\n");
    $redis->hSet("swooleId",$request->fd,$request->fd);
    $allId=$redis->hGetAll("swooleId");
    foreach ($allId as $id){
        $ws->push($id, date("Y-m-d H:i:s",time())."\n");
    }
//    while (true){
//        $ws->push($request->fd, date("Y-m-d H:i:s",time())."\n");
//        sleep(1);
//    }

});

$ws->on('message', function ($ws, $frame)use($redis) {
    echo "Message: {$frame->data}\n";
    //$ws->push($frame->fd, "server: {$frame->data}");
    $allId=$redis->hGetAll("swooleId");
    foreach ($allId as $id){
        if($id==$frame->fd){
            continue;
        }
        $ws->push($id, date("Y-m-d H:i:s",time())."内容为:".$frame->data."\n");
    }
});

$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is closed\n";
});



$ws->start();

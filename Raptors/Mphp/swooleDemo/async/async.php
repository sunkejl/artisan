<?php 
$serv = new swoole_server("127.0.0.1", 9501);

$serv->set(array('task_worker_num' => 4));

$serv->on('receive', function($serv, $fd, $from_id, $data) {
    $task_id = $serv->task($data);
    echo "Dispath AsyncTask: id=$task_id\n";
});

$serv->on('task', function ($serv, $task_id, $from_id, $data) {
    sleep(5);
    echo "sleep 5 New AsyncTask[id=$task_id]".PHP_EOL;
    $serv->finish("$data -> OK");
});

$serv->on('finish', function ($serv, $task_id, $data) {
    echo "finish AsyncTask[$task_id] Finish: $data".PHP_EOL;
});

$serv->start();

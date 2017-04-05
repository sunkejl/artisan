<?php
$id=swoole_timer_tick(2000, function ($timer_id) {
    echo "tick-2000ms\n";
});
var_dump($id);

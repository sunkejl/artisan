<?php
//网页输出内容 实时输出
set_time_limit(0);
ob_end_clean();
ob_implicit_flush();

header('X-Accel-Buffering: no'); // 关键是加了这一行。
$a = range(1, 100);
foreach ($a as $v) {
    echo $v;
    sleep(1);
}
exit;
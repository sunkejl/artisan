<?php
#浏览器无效
set_time_limit(0);
ob_end_flush();
for ($i = 0; $i < 10; $i++) {
    echo $i;
    flush();
    sleep(1);
}
<?php

echo "abc" . PHP_EOL;
ob_start();
echo "zxy" . PHP_EOL;
sleep(5);
echo "end" . PHP_EOL;
ob_end_flush();

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17
 * Time: 11:20
 */
echo DATE_ATOM.PHP_EOL;
$raw = '22. 11. 1968';
$start = DateTime::createFromFormat('d. m. Y', $raw);
echo 'Start date: ' . $start->format('Y-m-d') . "\n";

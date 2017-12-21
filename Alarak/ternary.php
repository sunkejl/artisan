<?php
$context = array('test' => array());

// optionally fill-in the test value with lots of data
for ($i = 0; $i < 100000; $i++) {
    $context['test'][$i] = $i;
}
// you can also just create a big string
// $context = str_repeat(' ', 1000000);

// benchmark
$time = microtime(true);
var_dump($time);
for ($i = 0; $i < 10000; $i++) {
    // the snippet of code to benchmark
//    $tmp = isset($context['test']) ? $context['test'] : '';
    if (isset($context['test'])) {
        $tmp = $context['test'];
    } else {
        $tmp = "";
    }
}
var_dump(microtime(true));
var_dump(microtime(true) - $time);
printf("TIME: %0.2d\n", (microtime(true) - $time) * 1000);

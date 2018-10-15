<?php

require 'ubm.php';

$loops = 1000000;

$str = "This string is not modified";
micro_benchmark('str_replace',  'bm_str_replace',  $loops);
micro_benchmark('preg_replace', 'bm_preg_replace', $loops);

function bm_str_replace($loops) {
    global $str;
    for ($i = 0; $i < $loops; $i++) {
        str_replace("is not", "has been", $str);
    }
}

function bm_preg_replace($loops) {
    global $str;
    for ($i = 0; $i < $loops; $i++) {
        preg_replace("/is not/", "has been", $str);
    }
}

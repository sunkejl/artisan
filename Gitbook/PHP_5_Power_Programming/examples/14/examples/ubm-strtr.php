<?php

require 'ubm.php';

$loops = 400000;

$str = "This string is not modified";
$replacemap = array("This" => "That",
                    "string" => "text",
                    "is not" => "has been",
                    "modified" => "changed");
micro_benchmark('str_replace',  'bm_str_replace',  $loops);
micro_benchmark('strtr', 'bm_strtr', $loops);

function bm_str_replace($loops) {
    global $str, $replacemap;
    $from = array_keys($replacemap);
    $to = array_values($replacemap);
    for ($i = 0; $i < $loops; $i++) {
        str_replace($from, $to, $str);
    }
}

function bm_strtr($loops) {
    global $str, $replacemap;
    for ($i = 0; $i < $loops; $i++) {
        strtr($str, $replacemap);
        preg_replace("/is not/", "has been", $str);
    }
}

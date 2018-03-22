<?php
/**
 * 还是可以同时修改变量和无序散列,可以加secretKey 或者composer找hmac
 */
function createParameters($array)
{
    $data = "";
    $ret = [];
    foreach ($array as $k => $v) {
        $data .= $k.$v;
        $ret[] = "$k=$v";
    }
    $hash = md5($data);
    $ret[] = "hash=$hash";

    return implode("&amp;", $ret);
}

$url = createParameters(['a' => 123, 'b' => 234]);
var_dump($url);

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/1
 * Time: 11:55
 */
$fp = fsockopen("www.skf.com", 80, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET  /api  HTTP/1.1\r\n";
    $out .= "Host: www.skf.com\r\n";
    $out .= "Connection: Close\r\n\r\n";
    fwrite($fp, $out);
    echo $out;
    while (!feof($fp)) {
        echo fgets($fp, 128);
    }
    fclose($fp);
}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/25
 * Time: 16:43
 */
require 'vendor/autoload.php';
$curl = new Curl\Curl();

$headers = array(
    "Connection: keep-alive",
    "Cache-Control: max-age=0",
    "Upgrade-Insecure-Requests: 1",
    "User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36",
    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
    "Referer: https://www.chiphell.com/space-uid-350705.html",
    "Accept-Encoding: gzip, deflate, sdch, br",
    "Accept-Language: zh-CN,zh;q=0.8,en;q=0.6,zh-TW;q=0.4",
);
$curl->setOpt(CURLOPT_HTTPHEADER, $headers);

$url="http://www.skf.com/api";
$curl->get($url, array(
    'foo' => 'keyword',
));
echo $curl->response;
echo 222;
exit;



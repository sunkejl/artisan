<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/25
 * Time: 9:43
 */

// 创建一个新cURL资源
$ch = curl_init();


// 设置URL和相应的选项
$options = array(
    CURLOPT_URL => 'http://www.example.com/',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json; charset=utf-8',
        'Content-Length: ' . strlen($data_string)
    ),
    CURLOPT_RETURNTRANSFER => true,         // return web page
    CURLOPT_HEADER         => false,        // don't return headers
    CURLOPT_FOLLOWLOCATION => true,         // follow redirects
    CURLOPT_ENCODING       => "",           // handle all encodings
    CURLOPT_USERAGENT      => "spider",     // who am i
    CURLOPT_AUTOREFERER    => true,         // set referer on redirect
    CURLOPT_CONNECTTIMEOUT => 120,          // timeout on connect
    CURLOPT_TIMEOUT        => 120,          // timeout on response
    CURLOPT_MAXREDIRS      => 10,           // stop after 10 redirects
    CURLOPT_POST            => 1,            // i am sending post data
    CURLOPT_POSTFIELDS     => $curl_data,    // this are my post vars
    CURLOPT_SSL_VERIFYHOST => 0,            // don't verify ssl
    CURLOPT_SSL_VERIFYPEER => false,        //
    CURLOPT_VERBOSE        => 1                //
);

curl_setopt_array($ch, $options);


// 抓取URL并把它传递给浏览器
$result = curl_exec($ch);
var_dump($result);

// 关闭cURL资源，并且释放系统资源
curl_close($ch);

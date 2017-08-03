<?php

// 创建一个新cURL资源  Client URL Library
$ch = curl_init();

// 设置URL和相应的选项
curl_setopt($ch, CURLOPT_URL, "http://hp.artisan.com/response.php");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept-Charset:utf-8', 'Content-type:application/x-www-form-urlencoded']);
curl_setopt($ch, CURLOPT_USERAGENT, "Safari/600.1.4");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(["name" => "23"]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取数据返回
$result = curl_exec($ch); // 抓取URL并把它传递给浏览器
var_dump($result);

// 关闭cURL资源，并且释放系统资源
curl_close($ch);



#F:\github_my_php\artisan\Raptors\Mphp\curl\chh.php
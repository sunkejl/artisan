<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/5
 * Time: 14:18
 */

// 创建一个新cURL资源  Client URL Library
$ch = curl_init();

// 设置URL和相应的选项
curl_setopt($ch, CURLOPT_URL, "http://hp.artisan.com/response_json.php");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch,CURLOPT_HTTPHEADER,[ 'Accept-Charset:utf-8','Content-type:application/json']);
curl_setopt($ch, CURLOPT_USERAGENT, "Safari/600.1.4");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(["name"=>23,"age"=>33]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 获取数据返回
$result=curl_exec($ch); // 抓取URL并把它传递给浏览器
echo $result;
var_dump(json_decode($result));

// 关闭cURL资源，并且释放系统资源
curl_close($ch);



#F:\github_my_php\artisan\Raptors\Mphp\curl\chh.php
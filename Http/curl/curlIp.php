<?php
$ch = curl_init();
curl_setopt($ch,CURLOPT_PROXY,"172.16.54.114");//设置代理 可以给fiddle 抓包
curl_setopt($ch,CURLOPT_PROXYPORT,8888);//代理端口
$url= 'http://172.168.1.1/method/api';//指定host服务器
$header = array( "Host:www.google.com", 'Accept-Charset:utf-8', 'Content-type:application/x-www-form-urlencoded');//指定头部中的Host
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

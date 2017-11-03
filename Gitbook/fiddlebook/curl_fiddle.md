1 tcpdump -l -i enp0s3 -w - src or dst port 80 | strings


2 改curl配置 指向fiddle代理，通过fiddle抓包
curl_setopt($ch,CURLOPT_PROXY,"172.16.54.114");
curl_setopt($ch,CURLOPT_PROXYPORT,8888);

3 服务器（或mac）直接绑定有fiddle的PC的ip



_________________
指定host 进行curl

$url= 'http://172.168.1.1/method/api';
$header = array( "Host: adminlocal.boqii.com", 'Accept-Charset:utf-8', 'Content-type:application/x-www-form-urlencoded');
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

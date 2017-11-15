$_SERVER['HTTP_CLIENT_IP'] 如果有代理服务器，一般是代理服务器ip，没有则为空
$_SERVER['HTTP_X_FORWARDED_FOR'] 如果有代理服务器的话，一般是原始ip，没有则为空，若有多个则也显示代理服务器ip
$_SERVER['REMOTE_ADDR'] 如果有代理服务器的话，则为最后一个代理的ip，没有则为连接的客户端ip  REMOTE_ADDR nginx传给php

登录时 会把ip和当前sessionId 绑定 导致抓包的http请求在虚拟机中请求无效 解决办法 在模拟请求中加入ip
伪造X-Forwarded-For 

discuz 

```php
 private function _get_client_ip() {
        $ip = $_SERVER['REMOTE_ADDR'];
        if (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
            foreach ($matches[0] AS $xip) {
                if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                    $ip = $xip;
                    break;
                }
            }
        }
        return $ip;
    }
```

curl "http://www.baidu.com/admin.php"
 -H e: UM_distinctid=15f9b18db7f4a7-0b79774279fcb7-5d153b16-1fa400-15f9b18db80c2a; cityId=31; __utma=137717295.330192151.1510281163.1510281163.1510281163.1; __utmz=137717295.1510281163.1.1.utmcsr=boqii.com^|utmccn=(referral)^|utmcmd=referral^|utmcct=/; Hm_lvt_16256b8df60004da41bb33a24cce8ba7=1510135622,1510281109; _jzqx=1.1510135768.1510329686.3.jzqsr=shop^%^2Eboqii^%^2Ecom^|jzqct=/pre-sale/69/23313^%^2Ehtml.jzqsr=shop^%^2Eboqii^%^2Ecom^|jzqct=/global/; _jzqa=1.1870803887587533800.1510135768.1510281169.1510329686.3; NTKF_T2D_CLIENTID=guest82E6E94F-B32A-58BE-F729-9B19A7CA2ACA; PHPSESSID=de999494e9795a8ee143b1c3a66d355d; boqiisid=de999494e9795a8ee143b1c3a66d355d" -H "Origin: http://adminlocal.boqii.com" -H "Accept-Encoding: gzip, deflate" -H "Accept-Language: zh-CN,zh;q=0.8,en;q=0.6,zh-TW;q=0.4" -H "User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.79 Safari/537.36" -H "Content-Type: application/x-www-form-urlencoded" -H "Accept: */*" -H "Referer: http://adminlocal.boqii.com/admin.php?m=orderform_orderglobal^&user=admin" -H "X-Requested-With: XMLHttpRequest" -H "Proxy-Connection: keep-alive"
 -H "X-Forwarded-For:172.16.54.248" -H "x-real-ip:172.16.54.248" --data "m=orderform_orderglobal^&type=getYiXiangExpressNumber^&globalId=PQ2017102600013" --compressed


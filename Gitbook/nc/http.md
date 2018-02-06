模拟http请求
```
nc 123.59.67.49 80

nc www.baidu.com 80
```

接下来 写http头部
```
GET http://www.xxx.com HTTP/1.1
Host:www.xxx.com
Connection: keep-alive
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8
Referer: http://admintest.boqii.com/admin_left.php
Accept-Encoding: gzip, deflate
Accept-Language: zh-CN,zh;q=0.9,en;q=0.8,zh-TW;q=0.7
```


就可以模http请求


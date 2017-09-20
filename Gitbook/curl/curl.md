curl 是与 url 进行交互的工具，支持 HTTP, HTTPS, FTP, FTPS, SCP, SFTP, TFTP, DICT, TELNET, LDAP or FILE 协议，这里示例 curl 与 http, https 的 url 进行交互。
 
GET HEAD POST PUT 请求
 
只要输出结果，不加任何参数， GET 请求。 示例：获取出口 ip 信息
 
curl http://ipinfo.io/
 
{
  "ip": "58.247.111.158",
  "hostname": "No Hostname",
  "city": "Shanghai",
  "region": "Shanghai Shi",
  "country": "CN",
  "loc": "31.0456,121.3997",
  "org": "AS17621 China Unicom Shanghai network"
}
发送 HEAD 请求，获取 response header 信息 示例：
 
curl -I http://voice.hupu.com
 
HTTP/1.1 302 Found
Server: nginx/1.4.2
Date: Sat, 28 Nov 2015 07:26:18 GMT
Content-Type: text/html; charset=utf-8
Connection: keep-alive
X-Powered-By: PHP/5.4.41
Location: http://voice.hupu.com/hot
X-Cache: BYPASS
X-Server: zhangwuji-lb-5-247-prd.jh.hupu.com
发送 HEAD 请求，并跟踪返回的 Location， -L 示例:
 
curl -I http://voice.hupu.com -L
HTTP/1.1 302 Found
Server: nginx/1.4.2
Date: Sat, 28 Nov 2015 07:27:31 GMT
Content-Type: text/html; charset=utf-8
Connection: keep-alive
X-Powered-By: PHP/5.4.41
Location: http://voice.hupu.com/hot
X-Cache: BYPASS
X-Server: zhangwuji-lb-1-233-prd.jh.hupu.com
 
HTTP/1.1 200 OK
Server: nginx/1.4.2
Date: Sat, 28 Nov 2015 07:27:31 GMT
Content-Type: text/html; charset=utf-8
Connection: keep-alive
Vary: Accept-Encoding
Vary: Accept-Encoding
X-Powered-By: PHP/5.4.41
X-Cache: BYPASS
X-Server: zhangwuji-lb-1-233-prd.jh.hupu.com
进行 POST 请求
 
curl http://127.0.0.1:4001/v2/keys/queue -XPOST -d value=Job1
进行 PUT 请求
 
curl -L http://127.0.0.1:4001/mod/v2/lock/mylock -XPUT -d index=5 -d ttl=20
HTTPS 请求
 
curl https 出现错误
 
curl -sS https://getcomposer.org/installer
curl: (60) SSL certificate problem, verify that the CA cert is OK. Details:
error:14090086:SSL routines:SSL3_GET_SERVER_CERTIFICATE:certificate verify failed
More details here: http://curl.haxx.se/docs/sslcerts.html
解决办法：
 
前往 http://curl.haxx.se/docs/caextract.html 下载 ca-bundle.crt 到 /etc/pki/tls/certs/ca-bundle.crt
 
http basic 认证
 
访问有 basic 认证的页面
 
curl -u myuser:mypass http://abc.example.com/manage
下载文件
 
下载单个文件，并保存为一样的名字
 
curl -O http://voice.hupu.com/nba/1977117.html
结合 shell 中的 pattern, 下载多个文件
 
curl -O http://voice.hupu.com/nba/[1977117-1977222].html
下载大文件断点续传， -C - 会自动判断从哪里开始继续下载
 
curl -C - -O http://mirrors.163.com/centos/6.7/isos/x86_64/CentOS-6.7-x86_64-minimal.iso
模拟 cookie, referer, user-agent, header 访问
 
模拟 cookie
 
curl -v -o /dev/null --cookie '__nmj=1;foo=bar' http://www.hupu.com
 
...
> GET / HTTP/1.1
> User-Agent: curl/7.30.0
> Host: www.hupu.com
> Accept: */*
> Cookie: __nmj=1;foo=bar
...
模拟 referer
 
curl -v -o /dev/null -e 'http://whatever.com' http://www.hupu.com
 
...
 
> GET / HTTP/1.1
> User-Agent: curl/7.30.0
> Host: www.hupu.com
> Accept: */*
> Referer: http://whatever.com
...
模拟 user-agent
 
curl -v -o /dev/null -A 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_1_2 like Mac OS X)' http://www.hupu.com
 
...
> GET / HTTP/1.1
> User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 7_1_2 like Mac OS X)
> Host: www.hupu.com
> Accept: */*
...
带一些 header 去访问
 
curl -v -o /dev/null -H 'Accept: application/json' -H 'Content-type: application/json' -H 'X-Forwarded-For: 8.8.8.8' http://www.hupu.com
 
...
 
> GET / HTTP/1.1 
> User-Agent: curl/7.30.0 
> Host: www.hupu.com 
> Accept: application/json 
> Content-type: application/json 
> X-Forwarded-For: 8.8.8.8 
...
指定代理服务器访问
 
指定 http 代理
 
curl -x 211.61.47.19:80 http://www.hupu.com
指定 socks5 代理
 
curl --socks5 127.0.0.1:1081 http://www.hupu.com
curl 输出访问过程，变量用于分析问题
 
-v，显示模式
 
curl -v -o /dev/null http://www.hupu.com
 
* Adding handle: conn: 0x7fba34004000
* Adding handle: send: 0
* Adding handle: recv: 0
* Curl_addHandleToPipeline: length: 1
* - Conn 0 (0x7fba34004000) send_pipe: 1, recv_pipe: 0
  % Total    % Received % Xferd  Average Speed   Time    Time     Time  Current
                                 Dload  Upload   Total   Spent    Left  Speed
  0     0    0     0    0     0      0      0 --:--:-- --:--:-- --:--:--     0* About to connect() to www.hupu.com port 80 (#0)
*   Trying 61.174.11.237...
* Connected to www.hupu.com (61.174.11.237) port 80 (#0)
> GET / HTTP/1.1
> User-Agent: curl/7.30.0
> Host: www.hupu.com
> Accept: */*
> 
< HTTP/1.1 200 OK
* Server nginx/1.4.2 is not blacklisted
< Server: nginx/1.4.2
< Date: Sat, 28 Nov 2015 08:45:06 GMT
< Content-Type: text/html
< Transfer-Encoding: chunked
< Connection: keep-alive
< Vary: Accept-Encoding
< Vary: Accept-Encoding
< X-Server: www-web-1-224-prd.jh.hupu.com
< X-Server: zhangwuji-lb-4-241-prd.jh.hupu.com
< 
{ [data not shown]
100  276k    0  276k    0     0   277k      0 --:--:-- --:--:-- --:--:--  277k
* Connection #0 to host www.hupu.com left intact
curl -v 显示请求站点，端口，解析到的 ip 地址， > 代表发送的 header，< 代表接收到 header。
 
-w 可以将更底层交互时一些变量输出出来，变量名前面要加 %{variable_name}。
 
一些有用的变量如下:
 
%{http_code} 状态码
%{size_download} 文件大小
%{speed_download} 下载速度
%{time_connect} 从开始到建立 tcp 用时
%{time_namelookup} 从开始到解析到 ip 用时
%{time_pretransfer} 从开始到传输开始用时
%{time_starttransfer} 从开始到第一个字节到达用时
%{time_total} 从开始到结束总共用时
 
可以通过 (time_pretransfer – time_connect) 计算出服务器从接到请求到准备传输，即服务器处理用时来评判断服务器性能。
 
curl -o /dev/null -w 'time_total: %{time_total}' http://www.hupu.com
总结： 结合不同参数可以方便的根据需要来进行 http url 的交互，相对于浏览器及 postman 等工具更轻量和灵活。
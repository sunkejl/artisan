

http head 信息

[https://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html](https://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html)

php curl 参数含义

[http://us.php.net/manual/zh/function.curl-setopt.php](http://us.php.net/manual/zh/function.curl-setopt.php)

tcpdump

tcpdump -i any tcp port 80

保存curl到本地文件

curl -o baiud.md www.baidu.com

显示response的头信息

curl -i www.baidu.com

显示通信的整个过程

curl -v www.baidu.com

显示更详细的过程

curl --trace output.txt www.sina.com

curl --trace-ascii output.txt www.sina.com

允许自动跳转\(跳转到www.sina.cn\)

curl -L www.sina.com

get请求

curl example.com/form.cgi?data=xxx

post 请求

curl -X POST --data "data=xxx" example.com/form.cgi

curl [http://127.0.0.1:4001/v2/keys/queue](http://127.0.0.1:4001/v2/keys/queue) -XPOST -d value=Job1

数据编码

curl -X POST--data-urlencode "date=April 1" example.com/form.cgi

其他http请求

curl -X POST www.example.com

curl -X DELETE www.example.com

上传文件

curl --form upload=@localfilename --form press=OK \[URL\]

referer来源网址

curl --referer [http://www.example.com](http://www.example.com) [http://www.example.com](http://www.example.com)

User Agent

curl --user-agent "\[User Agent\]" \[URL\]

cookie

curl --cookie "name=xxx;\_\_nmj=1;foo=bar" www.example.com

增加头信息

curl --header "Content-Type:application/json" [http://example.com](http://example.com)

-H 定义头部信息\(chrome 右击network的连接  查看curl命令 右击network -&gt;copy-&gt;copy as curl\)

curl '[http://baidu.com/](http://baidu.com/)' -H 'Upgrade-Insecure-Requests: 1' -H 'User-Agent: Mozilla/5.0 \(Windows NT 6.1; WOW64\) AppleWebKit/537.36 \(KHTML, like Gecko\) Chrome/54.0.2840.71 Safari/537.36' --compressed


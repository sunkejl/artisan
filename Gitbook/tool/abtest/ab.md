which ab
 
rpm -qf /usr/bin/ab |查看属于哪个软件包
 
ab -h  |看help
 
安装
ununtu 
apt-get install apache2-utils
 
 
http://httpd.apache.org/download.cgi#apache24
 
yum install httpd-tools
 
 ab  -c 100 -n 1000 http://3.hupu.com/
 
 -c 100 每次并发100个
 -n 10000 共发送10000个请求
 
 
qpb
 
 
Web服务器启动100个进程
1个请求耗时10S 就是10QPS
1个请求耗时0.1S 就是1000QPS
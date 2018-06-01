yum install net-tools (!ifconfig)
yum install php-5.4.41

./configure --prefix=/usr/local/webserver/nginx --with-pcre=/usr/local/webserver/src/pcre-8.37 --with-zlib=/usr/local/webserver/src/zlib-1.2.8 --with-openssl=/usr/local/webserver/src/openssl-1.0.1c

lsof -i -P =>kill 重启 
ps aux | grep php

netstat -tuln
netstat -an

nslookup www.baidu.com


wc test.php


df -hl 查看磁盘剩余空间

df -h 查看每个根路径的分区大小


tail f （实时查看）

/etc/rc.local (开机启动 绝对路径)

mysql -u root mp </opt/www/c/mp.sql

username:sunke
email sunkejl@live.com

http://flavio.castelli.name/2015/04/23/introducing-portus-a-user-interface-for-docker-registry/

docker login

ctrl +p ctrl+q 退出docker




gcc t.c -o t -m32 以32位去编译

status | show processlist


mysql -S/tmp/mysql.sock | tcp 远程连接

show global variables like 'socket';

phpstorm::alt+enter initialize fields

vim :: ci(

ci{


xdebug_time_index（）

window.close();

confirm(123);prompt()

http://select2.github.io/examples.html

通常 来说, 决定 采用 何种 方式 来 存储 数据 是 非常 重要的, 这样 便于 稍后这样 便于 稍后 检索 数据 时, 数据 会 自动 按照 某种 规定 的 顺序 给出。 用于检索 数据 的 一种 常用 结构 称为 栈stack, 它 检索 元素 的 顺序 与 存储 元素 的 顺序 相反。 用于 检索 数据 的 另一种 常用 结构 称为 队列Queue, 它是 按照 元素 到达 的 先后 顺序 来 释放 元素 的。

递归 尾递归 https://github.com/sunkejl/js/blob/master/js_0.html

替代
while(TRUE){}
1: crontab url;
2: add Queue;每个url处理100-200个；Queue 空了，重置;

继承破坏封装性，继承是紧耦合，继承扩展复杂 ||||||组合需要一一创建局部对象

俩个LARA出现500 $kernel 下 protected 'basePath' => string '/opt/www/××××' (length=16) 取错了

laravel 504 .evn REDIS_HOST参数丢失

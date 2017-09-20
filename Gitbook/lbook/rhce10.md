apache

最早名称httpd

版本

2.0常用版本（rhel5） 稳定

2.2主流版本 \(rhel6.x\)

2.4最新版本\(rhel7\)

1 事先创建进程,并不是请求后创建   子进程 和 线程  创建空的进程 等待响应

2按需维持适当的进程 。销毁多余的空闲进程  多长时间没请求 销毁进程

3模块化设计 功能需求 添加模块 。 核心比较小 各种功能 通过模块去添加的

4支持虚拟主机    基于ip的虚拟主机 基于端口的虚拟主机（端口 :8080） 基于域名的虚拟主机 （通过目录列表 指定不同的主页）

守护进程/usr/sbin/httpd

http 80

https 端口443 超文本包加密  ssl 安全套接字

/etc/httpd 配置文件

/var/www 站点页面的保存路径

软件包httpd

/etc/httpd/conf/httpd.conf

加速客户端的代理是正向代理，加速HTTP服务器的代理叫做反向代理

[https://httpd.apache.org/docs/2.4/zh-cn/vhosts/name-based.html](https://httpd.apache.org/docs/2.4/zh-cn/vhosts/name-based.html)

---

```
<Directory />
#    AllowOverride none
#    Require all denied
    AllowOverride All
    Require all granted
</Directory>

<VirtualHost *:80>
    ServerName other.example.com
    DocumentRoot "/www/otherdomain"
</VirtualHost>
```

https http+ssl 

一个模块 

通过非对称加密 。证书认证 。传输通过 公钥 私钥 加密

ssl   原先叫tls 传输层安全性

ssl 安全套接字层

到网络层前 明文 

第一次访问 下载证书 

自签名证书  方便 安全性不高

ca 独立服务器  仅仅颁证书 

yum install mod\_ssl

sslprotocol all -sslv2 -sslv3\(加3\) 

SSLHonorCipherOrder on

证书 路径



515  cd /etc/pki/tls/

  517  cd certs/

  520  make sk.crt  

  523  make sk.key

  525  mv sk.key ../private/

  527  chmod 600 sk.crt

  528  chmod 600 ../private/sk.key

  529  vim /etc/httpd/conf.d/ssl.conf\#修改俩个证书地址

  530  systemctl restart hhtpd


















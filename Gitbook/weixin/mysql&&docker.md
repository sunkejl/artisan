2016就要过去了，今天写一点的mysql几种安装方法并和docker结合起来。

yum和apt-get安装mysql的方法就不做介绍了，主要记录一下二进制安装和源码安装。

二进制安装速度比较快，而源码安装就会慢多了。

1

二进制安装（Installing MySQL on Unix/Linux Using Generic Binaries）过程可以分为:

1,下载二进制安装包  
2,解压到指定目录/usr/local/webserver  
3,将mysql的bin目录放到path中 export PATH=$PATH:/usr/local/mysql/bin  
4,初始化实例

5,编辑配置文件

6启动

具体过程如下

`mkdir /data`

`yum install wget libaio -y`

`wget`[`https://dev.mysql.com/get/Downloads/MySQL-5.7/mysql-5.7.17-linux-glibc2.5-x86\_64.tar.gz`](https://dev.mysql.com/get/Downloads/MySQL-5.7/mysql-5.7.17-linux-glibc2.5-x86\\_64.tar.gz)`#下载二进制包`

`groupadd mysql #添加用户`

`useradd -r -g mysql -s /bin/false mysql #添加用户组`

`tar -zxvf mysql-5.7.17-linux-glibc2.5-x86_64.tar.gz`

`mkdir -p /usr/local/webserver #自定义安装的目录`

`mkdir -p /mysql #自定义mysql数据的目录`

`mv mysql-5.7.17-linux-glibc2.5-x86_64 /usr/local/webserver/mysql`

`cd /usr/local/webserver/mysql`

`cp support-files/my-default.cnf /etc/my.cnf`

`sed -i "s/\# basedir = ...../ basedir = \/usr\/local\/webserver\/mysql/g" /etc/my.cnf #修改/etc/my.cnf 配置成我们自定义的目录`

`sed -i "s/\# datadir = ...../ datadir = \/mysql\/data/g" /etc/my.cnf`

`sed -i "s/\# socket = ...../ socket = \/tmp\/mysql.sock/g" /etc/my.cnf`

`bin/mysqld --initialize --user=mysql #初始化 生成随机密码`

`support-files/mysql.server start --ledir=/usr/local/webserver/mysql/bin #启动mysql`

通过Docker编辑Dockerfile 这样我们可以在本地build 或者通过把文件传上github  通过dockerhub绑定从而自动build

ubuntu 安装 docker apt-get install docker.io

centos 安装 docker  yum install docker-io

新建Dockerfile 把下面的复制进去 然后执行

`docker build -t someName .`

就在本地生成了someName的image

通过docker run -it someName /bin/bash 就可以进入刚生成的容器

Dockerfile的内容如下

`FROM centos`

`MAINTAINER sunke sunkejl@live.com`

`RUN mkdir /data`

`WORKDIR /data`

`RUN yum install wget libaio -y`

`RUN groupadd mysql`

`RUN useradd -r -g mysql -s /bin/false mysql`

`RUN wget`[`https://dev.mysql.com/get/Downloads/MySQL-5.7/mysql-5.7.17-linux-glibc2.5-x86\_64.tar.gz`](https://dev.mysql.com/get/Downloads/MySQL-5.7/mysql-5.7.17-linux-glibc2.5-x86\\_64.tar.gz)

`RUN tar -zxvf mysql-5.7.17-linux-glibc2.5-x86_64.tar.gz`

`RUN mkdir -p /usr/local/webserver`

`RUN mkdir -p /mysql`

`RUN mv mysql-5.7.17-linux-glibc2.5-x86_64 /usr/local/webserver/mysql`

`WORKDIR /usr/local/webserver/mysql`

`RUN cp support-files/my-default.cnf /etc/my.cnf`

`RUN sed -i "s/\# basedir = ...../ basedir = \/usr\/local\/webserver\/mysql/g" /etc/my.cnf`

`RUN sed -i "s/\# datadir = ...../ datadir = \/mysql\/data/g" /etc/my.cnf`

`RUN sed -i "s/\# socket = ...../ socket = \/tmp\/mysql.sock/g" /etc/my.cnf`

`RUN bin/mysqld --initialize --user=mysql > /data/password.md 2>&1`

`#RUN support-files/mysql.server start --ledir=/usr/local/webserver/mysql/bin`

源码安装mysql的步骤可以分为  
1,下载源码包  
2,安装必要包  
3,cmake  
4,make && make install  
5,初始化实例

6,编辑配置文件

7,启动

如果在虚拟机上直接安装可以参考下面的Dockerfile来实现

源码安装的的Dockerfile如下

`FROM centos`

`MAINTAINER sunke sunkejl@live.com`

`RUN mkdir /data`

`WORKDIR /data`

`RUN groupadd mysql`

`RUN useradd -r -g mysql -s /bin/false mysql`

`RUN yum install wget gcc wget make gcc-c++ perl openssl-devel libxml2-devel libcurl-devel libpng-devel freetype* cmake git ncurses-devel bison -y`

`RUN wget http://dev.mysql.com/get/Downloads/MySQL-5.7/mysql-5.7.17.tar.gz`

`RUN tar zxvf mysql-5.7.17.tar.gz`

`WORKDIR /data/mysql-5.7.17`

`RUN cmake -DCMAKE_INSTALL_PREFIX=/usr/local/webserver/mysql  -DMYSQL_DATADIR=/mysql/data  -DMYSQL_UNIX_ADDR=/tmp/mysql.sock -DDEFAULT_CHARSET=utf8 -DDEFAULT_COLLATION=utf8_general_ci  -DEXTRA_CHARSETS=all  -DENABLED_LOCAL_INFILE=1 -DDOWNLOAD_BOOST=1 -DWITH_BOOST=/usr/local/webserver/boost`

`RUN make`

`RUN make install`

`RUN mkdir -p /mysql/data`

`WORKDIR /usr/local/webserver/mysql/bin`

`#RUN ./mysqld --initialize   --user=mysql --datadir=/mysql/data --basedir=/usr/local/webserver/mysql --socket=/tmp/mysql.sock`

`#mysql>ALTER USER 'root'@'localhost' IDENTIFIED BY 'MyNewPass';`  
注释的内容为进入容器初始化mysql 和 重置密码

配图为（IN WIN X-Frame 2.0的机箱）


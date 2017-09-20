# 线上部署

[课程地址](http://mooc.study.163.com/learn/NEU-1000080002?tid=2001223006#/learn/content?type=detail&id=2001414095)

分支 官方版本 还是mariadb（原班人马开发）

安装方式 包安装 二进制包安装 源码安装

路径配置 参数配置 标准化

一个实例多个库 多个实例单个库

mysql单进程 单个资源浪费 
一个服务器 多个实例


二进制安装包
解压到指定目录/usr/local
将mysql目录放到path中 export PATH=/usr/local/mysql/bin
初始化实例 编辑配置文件 启动
/usr/lcoal/mysql/scripts/mysql_install_db --user=mysql --basedir=  --datadir=  
cp my.conf ***.conf
vim
max_connections=2000最大连接数
mysqld_safe启动 守护进程脚本

帐户安全设置
删除mysql.user里用户名为空的用户
保留一个本地登录的帐户
set password for root@"localhost"=passwor("123456");
flush privileges;#reload权限
删除test库 任何用户都能在test库里增删改查


源码安装mysql
下载源码包
安装必要包
cmake
make && make install 
初始化实例 编辑配置文件 启动
帐户安全


 5.5升级到5.6
下载5.6 安装好修改5.6配置参数
新版本启动
利用mysql_upgrade 升级数据 一般只升级系统权限表-s 其他表太大

多实例安装
32核 190G内存 四个实例
单进程 多线程
利用系统资源 

资源隔离
连接数 缓存 都是共享
业务模块隔离 一个需要utf8mb4 另一个不需要

配置数据目录
初始化实例
修改参数
清除不安全帐户
status
delete from msyql.user where user='';
delete from mysql.user where host <> "localhost";
drop database test;
flush privileges;#刷新权限

源码安装 耗费时间 一般用二进制包安装










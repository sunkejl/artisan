# 数据备份
[课程地址](http://mooc.study.163.com/learn/NEU-1000080002?tid=2001223006#/learn/content?type=detail&id=2001414092&cid=2001403113)


数据备份
应对硬件故障数据丢失
应对误删除

制作镜像库提供服务


备份数据文件和操作日志（binlog）
利用binlog准确恢复到某一天

冷备份 
数据停止服务 拷贝数据文件

热备份
不影响读写服务备份数据库

物理备份
数据页的形式拷贝数据

逻辑备份
导出为裸数据或SQL（insert）语句 简单 比较慢 数据量小的情况

本地备份
在数据库服务器本地进行备份   少了网络传输

远程备份
远程连接数据库进行备份   对网络有要求

全量备份
完整备份数据库  数据量大 几天都备份不完 每周一次全量 每天一次增量

增量备份
数据量非常大 只备份上一次备份以来发生修改的数据 占用空间小 快

备份周期考虑的因素
数据库大小（决定备份时间）
恢复速度要求
备份方式（全量还是增量）

常用工具
mysqldump 逻辑备份 单线程 适合数据量小的库 热备
xtrabackup 第三方开源 物理备份 热备
mydumper 开源工具 mysqldump增强版 多线程备份
cp 复制 物理备份 冷备份

mysqldump 可以备份为csv 或sql的形式

mysqldump --help

1)mysqldump -uroot -p123456 --socket=XXX --all-databases > XXX.sql
2)mysqldump -uroot -p123456 --socket=XXX --databases db2 > XXX.sql
3)mysqldump -uroot -p123456 --socket=XXX db2 t1 > XXX.sql

./mysqldump -uroot -p123456 --socket=/tmp/mysql.sock --all-databases >/data/mysql_bak_20161106.sql

还原表
create databse db3;
source /data/mysql_bak_20161106.sql;#就能还原

一致性备份 开启事务 不锁表  --single-transaction  不加会锁表
mysqldump --single-transaction -uroot -p123456 --all-databases > XXX.sql


远程备份 TCP/IP连接数据库
查看连接错误 tail -f /mysql/data/sk-VirtualBox.err


设置远程访问权限 
update mysql.user set host = '%' where user ="root";
grant all privileges on *.* to 'root'@'%';
FLUSH PRIVILEGES;

远程连接
mysql -uroot -p -h192.168.1.107 -P3306;

远程备份
mysqldump -utest -ptest -hXXX -P3306 --all-databases > XXX.sql

导出CSV格式 加-T参数
-T 默认为制表符
--fields-terminated-by=, 修改分隔符
7)mysqldump --single-transaction -uroot -p123456 db1 -T XXX
8)mysqldump --single-transaction -uroot -p123456 db1 -T XXX


xtrabackup 
在线备份InnoDB表
支持限速
支持流备
支持增量备份
支持压缩和加密
支持并行备份和恢复 速度快

innobackupex xtrabackup只能备份innoDb innobackupex升级为全部引擎

innobackupex --user=root --password=123456 --defaults-file=/etc/mysql/my.cnf /dbbackup
增量备份
use db2;
insert into t2 seelct * from t2;
innobackupex --user=root --password=123456 --defaults-file=/etc/mysql/my.cnf --incremental --incremental-dir /dbbackup/2016-4-3_13:24:32 /dbbackup #增量备份 指定上一次的路径

流式备份 --stream 支持tar和自带的xbstream
innobackupex --user=root --password=123456 --defaults-file=/etc/mysql/my.cnf --stream=xbstream /dbbackup/ > /dbbackup/stream.bak

并行备份 --parallel 4个线程进行备份
innobackupex --user=root --password=123456 --defaults-file=/etc/mysql/my.cnf --parallel=4 /dbbackup/

限速 --throttle=10 限制为10M
innobackupex --user=root --password=123456 --defaults-file=/etc/mysql/my.cnf --throttle=10 /dbbackup/

压缩备份 --compress-thread 4 
innobackupex --user=root --password=123456 --defaults-file=/etc/mysql/my.cnf --compress --compress-thread 4 /dbbackup/

du -sh /*
查看当前目录文件的大小
du -sh * 

备份策略
考虑因素
1.数据库是不是innodb表
是innodb 可以热备
mysam会锁表 冷备

2.数据量大小
数据小 mysqldump 逻辑备份
非常大 全量备份加增量备份

3.本地空间是否充足
mysqldump远程备份 和xbackup 流备份

4.需要恢复的速度
非常重要 几个小时备份一次























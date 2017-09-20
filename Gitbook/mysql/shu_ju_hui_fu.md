# 数据恢复

[课程地址](http://mooc.study.163.com/learn/NEU-1000080002?tid=2001223006#/learn/content?type=detail&id=2001414093)
硬件故障
人为误删除
业务回滚
部署镜像库 查看历史数据

恢复的必要条件
有效备份
完整的数据库操作日志binlog

反转SQL语句 binlog必须是row模式
insert  =>delete
update   =>update
delete  =>insert

mysqldump备份=>source恢复
xtrabackup备份=>xtrabackup恢复
binlog备份=>mysqlbinlog恢复

备份./mysqldump -uroot -p sbtest sbtest1 >/data/sbtest1.sql
恢复 source /data/sbtest1.sql

innobackupex --apply-log /dbbackuip/20151120/ innobackup普通备份只需要指定备份目录

innobackupex 增量备份的还原
todo 

innobackupex 压缩备份的还原
todo

innobackupex 流备份的还原
todo

mysqlbinlog 恢复 可以指定起始时间 终止时间 起始位置 终止位置
./mysqlbinlog --help

mysqlbinlog mysql-bin.00001|less 看不懂文件内容 加- vv参数 转换成sql语句

show master status;查看 binlog文件 偏移量 

记录一开始的偏移量position  插入  记录插入后的position 删除数据 

mysqlbinlog --start-position=2233839 --stop-position=23333399 /data.mysql-binlog.00001 | mysql -uroot -p 


恢复误删数据

binlog -vv /data/mysql-binlog.0001
在里面找到删除的关键词
构造反转语句 重新插入表中
数量多 写脚本 恢复

数据库删除
备份加 binlog恢复
拷贝.conf 修改端口和文件目录 新启一个mysql实例 恢复备份
binlog -vv
找到误删除的上一个位置点

mysqldump ....|mysql -uroot -p 一条语句 直接dump+还原

查看
mysqlbinlog -vv --start-position=2792521 --stop-datetime="2016-05-31 00:00:00"|less

恢复
mysqlbinlog -vv --start-position=2792521 --stop-datetime="2016-05-31 00:00:00"|mysql -uroot -p

尽量避免恢复

有备份才能恢复


备份需求分析

binlog format=row
从库 备份
当天备份避免压缩备份


恢复记录 binlog

恢复表 binlog恢复不了 需要最近一次备份+binlog



Slowlog设置:
Set global slow_query_log=ON/OFF;   打开、关闭slowlog
set global long_query_time=1/5/0.2;   设置慢查询阈值
Set global log_output=“FILE” / “TABLE”;     设置慢查询存储位置
show variables like ‘slow_query_log_file’;  查看sloglog文件位置

select @@slow_query_log,@@long_query_time,@@log_output,@@slow_query_log_file;


1.使用tcpdump抓取mysql协议包
tcpdump -s 65535 -x -nn -q -tttt -i any -c 1000 port 3306 > mysql.tcp.txt















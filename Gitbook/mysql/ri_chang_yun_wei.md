# 日常运维


[课程地址](http://mooc.study.163.com/learn/NEU-1000080002?tid=2001223006#/learn/content?type=detail&id=2001414097)

日常工作
导数据
数据修改
表结构变更
加权限
问题处理

其他
数据库选型部署 设计 监控 备份 优化 等


导数据及注意事项

db1 => tb1

导出csv
mysqldump 和 select into outfile

mysqldump -uroot -p db1 tb1 >/tmp/t1.sql

mysqldump 直接导出 会对表加锁  可以对从库做
加上--single-transaction  一致性备份 开启一致性快照  不会锁表

show variables like "%general_log%" 日志  tail -f 记录日志
查看mysqldump会有哪些操作

不加--single-transaction
lock t1;
unlock t1;

mysqldump -uroot -p db1 tb1 -T /tmp/
-T 导出.txt和.sql(表定义文件) 俩个文件 

slect * from t1 into outfile "/tmp/t1.sql";
不导出.sql文件 随意命名
可以join
帐户需要 grant file on *.*  to netease@'localhost';
用户需要select 和 file权限
mysqldump还需要lock权限

数据修改和注意事项
修改前做好备份
开启事务 没问题提交 有问题 回滚
select * from t1 limit 10;

begin;
update t1 set b=100, c=100 wehre id <5;
commit;/rollback;

一次性操作大量数据 分批操作

表结构变更
加字段和索引
5.6之前变更表结构 会锁表
5.6之后更改主键和更改字段类型也会锁表

alert table t5 add a int;

percona公司

加权限只给符合需求的最低权限
用户不存在 新建用户
密码不一致会更改用户密码identified by '123'改密码

show grants;
grant insert,update,delete on *.* to netease@'localhost' identified by '123';

拥有super权限的用户对只读数据库也能写入！

数据库慢
秒级别慢 还是毫秒级别的慢

先show processlist;

top

tcprstat a


tcprstat 


tcpstat --port 4001 -t 1 -n 0

yum install sysstat
iostat 查看IO开销













# 日志文件

[课程地址](http://mooc.study.163.com/learn/NEU-1000080002?tid=2001223006#/learn/content?type=detail&id=2001414090)

1. 日志文件的分类 （服务错误日志，慢查询日志，综合查询日志）    
服务器日志文件      
记录启动运行中的特殊事件       
抓取特定的SQL语句       
2. 事务日志  （存储引擎事务日志，二进制日志）     
记录程序对数据的更改        
数据恢复        
实例间数据同步      


服务错误日志       
记录实例启动过程中重要消息          
log_error=/data/mysql_data/mysqld.log                
内容并非全是错误消息                    
如果mysqld进程无法正常启动 先查看错误日志


```
mysql> show global variables like 'log_error';
```
 log_error     | /mysql/data/sk-VirtualBox.err |
 
 tail -f
 
 慢查询日志
 记录执行时间超过一定阀值的SQL语句
 show_query_log=1 #是否打开
 show_query_log_file=/data/ 
 long_query_time=5 #超过多少秒的查询记录      
```
 show global variables like "%slow%";
 set global slow_query_log = 1;
 show global variables like "%long%";#查看多少秒 5秒比较合理 5.5以后可以设置为微秒 以前为秒

```

综合查询日志
如果开启将会记录系统所有SQL语句
general_log=1
general_log_file=/data/...
分析系统问题 对IO性能有开销
```
 show global variables like "%general%";
 set global general_log =1;

```
```
show global variables like "%log_output%"
```
log_output={file|table|none}
file 是输出到文件
```
set global log_output=table #变成用表记录日志
```
```
mysql> select * from sbtest1 \G;美化命令行输出
```

日志过大 先mv 剪切走
再执行
```
mysql> flush logs;#就会新建空的日志文件
```

存储引擎事务日志
存储引擎拥有重做日志(redo log) 可用于事务恢复 redo log大小影响innodb性能 

INNODB采用俩个事务文件交替重用 如果一个文件中写满 写另一个 另一个写满 看第一个的数据有没有写入磁盘 写入了就往第一个里写


二进制日志 binlog
记录数据引起数据变化的SQL语句或数据逻辑变化内容
mysql服务层记录 不管使用什么引擎
binlog主要作用 
基于备份恢复数据
主从同步（通过传输和共享binlog方式）
挖掘分析sql语句

log_bin=/    

sql_log_bin=1    

sync_binlog=1    
设置=0 mysql不会主从刷到磁盘上  设置 =100 100次操作     
刷新到磁盘上  =1 1次操作刷新到磁盘上 对磁盘IO要求高      

```
show global variables like 'log_bin';
```
lob_bin是只读参数 set global log_bin = 1; 不能修改

flush logs;刷新日志文件  日志文件关闭 打开新的 不断递增往上


mysql_bin.index 文件文件 记录bin_log 路径

mysql >show binary log; 
查看日志文件

max_binlog_size = 100MB  单个文件的最大
expire_logs_days=7 自动保存7天以内的binlog日志

手动清理bin_log
purge binary logs to 'mysql-bin.00007' 只保留7开始的文件         
purge binary logs before '2015-06-01 22:24:25';


查看binglog       
```mysql >show binlog events in 'mysql-bin.00010';```

227为bin_log下的pos 
```mysql >show binlog events in 'mysql-bin.00010' from 227 limit 2;```


select 不会记录在binlog中

select uuid();生成随机的id  
insert into tab values(uuid()); binlog只会记录下uuid();

show global varibales like "%binlog_format%";
set global variables binlog_format=row;
设置为row   针对每一行数据的变化
row不记录sql语句 
只能要靠mysqlbinlog工具查看
mysqlbinlog --base64-output=decode-rows -v (日志路径)

三种格式          
row  每一行记录的修改 容易产生较大的文件         
statement  对于uuid()这样的函数 记录会有风险   不安全      
mixed  Mysql 自动分析用什么来记录  如果是定量用statement 如果是变量 用row  



慢查询日志分析

1.mysql processlist定位慢查询
2.mysql slowlog来分析
3.使用pt-query-digest分析慢查询

1
show processlist;
show full processlist; 打印全部sql语句
sleep空闲
大部分 连接都是sleep 
找query的连接 explain 语句 看看是不是要加索引

2
show global variables like "slow_query_log";
set global slow_query_log=on;也可以在配置文件里加 精确到秒
show global variables like "%long_query_time%";设置慢查询阀值
show global variables like "%slow_query_log_file%";
set global log_output="FILE"/"TABLE";慢日志存储位置 一般是file 对数据库存储有影响 表太大


3
tcpdump 抓包>.txt
pt-query-digest 这个工具分析抓到的包


















 



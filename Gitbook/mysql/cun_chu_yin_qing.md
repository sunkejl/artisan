# 存储引擎

[课程地址](http://mooc.study.163.com/learn/NEU-1000081000?tid=2001223004#/learn/content?type=detail&id=2001413160)

服务层
接收大脑 接受sql语句 传给存储引擎
 
存储引擎层
用什么笔，记录在哪,存储引擎觉得怎么储存

可以基于表来选择存储引擎
engine = innodb | myisam

```show engines ;```
 查看可选择的存储引擎

myisam 堆表(先存放的在下面，后存放的在上面) 不支持事务 会锁表 并发不好 写锁粒度大 通常只能一个连续进行大量写操作 有阻塞

系统表全是myisam
myisam可直接拷贝文件去目标库下

memory存储引擎
create temporary table tmp(id int) engine=memory
适合偶尔作为临时表使用 临时表只对当时的连接有效 数据无需保存

blackhole存储引擎
黑洞存储引擎 主从同步会用到

tokudb
支持事务 行锁  适合大批量insert场景

mysql cluster
分布式集群
节点间存在冗余 一台不可用别的可用  高可用
支持事务
面向未来的引擎

修改存储引擎 alter table m engine=innodb;

todo

InnoDB 索引组织表 （聚簇表）
根据主键寻址速度快
主键递增的insert插入效率好
主键随机insert插入效率差
innoDB表必须指定主键，建议使用自增数字
innoDB在第一访问会把数据写入buffer pool 内存缓存 中 下一次直接从缓存中读取 IO效率高 性能好 减少物理io
innoDB数据持久化和事务日志
内存中的数据变化（称为脏数据）会先写入redo log 日志文件 后台异步把修改刷新到数据文件
发生故障 重放日志恢复 
持久化参数
innodb_flush_log_at_trx_commit   
持久化参数 
0：每秒持久化  每隔1秒写入持久化日志；
1：一条也不会丢，频繁性能受影响 每次commit都写入并持久化日志；
2：每次提交日志写到内存 每1S持久化一次
所有配置 相对misam丢的算少

行级锁
写不阻塞读 
不同行的写互相不阻塞
并发性能好

事务ACID完整支持
主外键约束 虽然可以保证一致性 对写性能影响大 让程序去保证




日志  find / -name *ib_logfile*    
innodb_buffer_pool_size                   | 536870912     缓存池大小 






读：
MyISAM读取快，是因为MyISAM的索引和数据是分开的，并且索引是有压缩的，内存使用率就对应提高了不少，内存能加载更多索引。而Innodb是索引和数据是紧密捆绑的，没有使用压缩从而会造成Innodb比MyISAM体积庞大不小，IO去磁盘取数据频繁些（IO多可以通过缓存来缓解一些，提高内存命中率）。

写：
InnoDB写入快，因为是行锁，而MyISAM是表级锁。














# InnoDB事务锁

[课程地址](http://mooc.study.163.com/learn/NEU-1000081000?tid=2001223004#/learn/content?type=detail&id=2001413162)

计算机程序锁
控制对共享资源进行并发访问
保护数据的完整性和一致性

事务锁lock  数据库逻辑内容
底层锁latch/mutex 保护线程 内存数据结构

事务锁粒度
行锁 innoDB Oracle

页锁 sql servel  数据页 都加锁

表锁 myisam  

InnoDB四种基本锁模式
共享锁 读锁 行锁
排他锁 写锁 行锁
意向共享锁 表级  自动添加 自动释放
意向排他锁 表级  自动添加 自动释放

一般select 语句不会加任何锁 不会被任何事务锁阻塞 对select 可手动加锁

begin;
select *　from t where a=3 for update ; 
加上一个排他锁  排他锁无法和任何锁兼容 其他锁都加不上

这个时候 其他链接无法再加锁，进入等待 等待时间可以修改 
show global variables like "%wait%";
innodb_lock_wait_timeout      60  
60秒后抛出锁超时错误

begin;
select *　from t where a=3 lock in share mode; 
加上一个共享锁  别的连接可以加共享锁 不能加排他锁

开启事务后
update delete 会自动对这行加上独占锁 别的连接无法操作，其他行可以操作

InnoDB 行锁是通过索引实现的，当条件的索引重复时 俩行记录都会加锁
如果表上没索引 ，对整个表加锁
俩个字段都有索引 InnoDB对俩个索引加锁

InnoDB行锁
只有条件走索引才能实现行级锁
索引上有重复值 会锁住多个记录
查询有多个索引可以走 可以对不同索引加锁
是否走索引 是由MYSQL优化器决定的 用expain看一下 delete update是否走索引

加锁查询时 最好对自增主键做条件更新

幻读 开启事务后，别的连接insert，后出现俩次读取不一致 *
gap 锁 为了消灭幻读 ，比如插入27 如果27前面是24，24-27的值在别的连接也插不进去：使用自增主键可避免
开发时更新基于主键或唯一键 避免gap锁


死锁 : 俩个连接互相等待对方的锁 A锁住id=10 B锁住id=30 A无法操作30 B无法操作10 互相等待
数据库会自己选回滚代价小的事务回滚   
应用程序逻辑问题
如何避免 程序更新时 按排序进行更新
缩短事务长度




悲观锁 ： 对数据要求高 一开始就把那条记录锁住  select * from tab where ？  for update     修改       commit;

乐观锁 :  最后一步修改 才加锁 一开始不给记录加锁  update tab where id =10 给这行加锁（update直接加锁了）  修改 commit;

实践课   [地址](http://mooc.study.163.com/learn/NEU-1000081000?tid=2001223004#/learn/content?type=detail&id=2001452010&cid=2001457051)

事务和锁的场景

需要保证操作的原子性

利用锁避免业务纠纷

查询库存时候 提前用for update人工加锁

大事务的好处 是可以回滚

但如果大事务几个小时不提交 或者 断网 未提交的数据丢失了

show processlist 查看当前有多少连接在查询

把持锁不释放 叫悬挂事务 

查看目前锁把持了多长时间
select trx_mysql_thread_id,trx_state,now()-trx_started,trx_rows_locked from information_schema.innodb_trx;

解决悬挂事务的办法用show processlist 找出id kill掉

 












































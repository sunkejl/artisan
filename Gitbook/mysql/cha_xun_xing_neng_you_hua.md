# 查询性能优化

最重要的是响应时间
查询是一个任务 它由一系列子任务组成 每个子任务会消耗一定时间
优化子任务 消除子任务 减少子任务的执行次数 让子任务更快

慢查询基础 优化数据访问

是否想数据库查询了不需要的数据
1加limit
2多表关联返回所有表的列
3去除全部的列 禁止select * 
4查询相同的数据 页面里俩个地方可以共用的数据

响应时间
服务时间和排队时间 服务时间是真正花了的时间 排队时间是等待行锁等

扫描行数和返回行数

访问类型
EXPLAIN TYPE 反应的访问类型 
访问类型有 索引扫描 范围扫描 唯一索引扫描 常量引用、

复杂查询还是简单查询的选择
通用服务器上 每秒超过10W次查询 千兆网卡也能满足每秒2000次查询
一个查询能胜任 就不需要携程多个独立的查询

切分查询
一次删除1W条数据 可以分为几次去删除 加LIMIT

分解关联查询
SELECT * from tag join tag_post on tag_post.tag_id=tag_id join post on tag_post.post_id =post.id where tag.tag="mysql";

select * from tag where tag ="mysql"
select * from tag_post where tag_id=123;
select * from post where post.id in (1,2,3);

1缓存效率更高 如果上面的数据已经被缓存了的话
2单个查询 减少锁竞争
3更容易对数据库拆分
4in()代替关联查询 让MYSQL按ID顺序查询 比随机关联更高效
5减少沉余查询 应用层关联 某条数据只需查一次 数据库做关联 需要重复的访问一部分数据 减少网络和内存的消耗
6相当于在应用中实现的哈希关联 而不是用MYSQL的嵌套循环关联



查询执行的基础 
1客户端发送一条查询给服务器
2服务器先检查缓存 命中缓存 就立即返回
3服务端SQL解析 预处理 优化器生成对应的执行计划
4返回结果给客户端

mysql_query() 这一步PHP已经将所有结果缓存到内存中  如果很大的结果集时 并不好
while(mysql_fetch_arrray()) 这一步是从缓存中取出数据
mysql_unbuffered_query() php不会缓存结果

查询状态
一个MYSQL连接 或者说一个线程 任何时刻都有一个状态
SHOW FULL PROCESSLIST 返回结果集中的COMMAND列 就是当前状态
如sleep query locked ...

一旦使用了distinct 和group by 会产生临时中间表

count()
集合函数
有俩个作用
1 统计某个列值的数量 要求列值非空（不统计null） ()内指定列 和列的表达式
2 统计结果集的行数 写count(*)

EXPLAIN 不需要真的执行查询 成本低

优化关联查询 
on或者using 列上有索引  只需要关联顺序上第二个表相应的列上创建索引
group by 和order by 只涉及一个表上列 才可能使用索引优化

尽可能使用关联 不要用子查询 但不绝对

子查询需要创建和填充临时表 而子查询中创建临时表没有索引（MariaDB修复了这个限制）

优化limit分页 
最大的问题是offset
优化方式是 select * from rental where id >10000 order by id desc limit 20

mysql 队列的实现
不好的办法 select for update
begin
select * from emails where status = "unsent" limit 10 for update
update emails set status="claimed" where id in (1,2,3);
commit;
俩个查询间的间隙时间 这里的锁会让别的查询全部被阻塞 

范围条件查询放在where条件的末尾 如(tid<10000)

一般不要用轮询 效率低
尽可能快完成 事务提交的速度越快 持有的锁时间越短 

最好把任务队列从数据库迁移出来 REDIS是很好的队列容易














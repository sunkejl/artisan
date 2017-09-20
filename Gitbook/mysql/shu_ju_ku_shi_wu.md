# 数据库事务

[课程地址](http://mooc.study.163.com/learn/NEU-1000081000?tid=2001223004#/learn/content?type=detail&id=2001413158)

事务是一系列有序的数据库操作

事务进行到一半 宕机了 再次开启Mysql 事务会回滚

`start transaction;`  `begin` 开始  之后不是提交就是回滚

`commit;`     提交  
`rollback;`    回滚

`start transaction;`  
insert 1  
`savepoint al;`  
insert 2  
`rollback to al;`  
insert 3  
`commit`  
1，3保存 2不在

al名字随便定义 **保存点** 不常用

`truncate table t;`  
清空数据库

系统默认自己自动提交autocommit;  可以关闭

`show global variables like '%auto%';`

`set global autocommit =0;`

`set session autocommit=0;` 关闭**当前连接**自动提交  
 插入后 关闭Mysql 再开启 查询不到之前的插入 需要手动提交  
`show session variables like "%atuo%"`

开启autocommit 每个事务只能容纳一个sql语句 线上大部分关闭掉自动提交

开启自动提交 DML会自动提交

DDL 永远自动提交 并且无法通过rollback回滚 修改表结构 无法修改  DDL 没有后悔药  
`alter table t1 add(d int);`  
如果DDL之前有插入操作 即使关闭了自动提交 之前的操作都会提交进数据库

四大属性  
原子性  atomicity :要么全部执行 要么都不执行 中途发生意外 未提交的事务都应该被回滚  
一致性  consistency :数据的正确性 合理性 完整性   数据一致 符合应用需要的规则  
隔离性  isolation ：提交前 中间数据变化对其他事务或者查询不可见  
持久性  durability : 提交完成的事务对数据库的影响必须是持久化的（数据库对磁盘的操作是先写入事务日志 再异步同步进磁盘 持久化 这是从性能考虑 磁盘随机写比较缓慢 机械磁盘对事务日志的操作是有序的）

三种隔离现象  
1 脏读Dirty read 事务B读到事务A尚未提交的数据变更

2 不可重复读nonrepeatable read 事务B未提交时 前后俩次读取一条记录 之间该记录被事务A修改并提交 于是事务B读到了俩次不一样的结果（如一开始事务B读取到a=1 事务A提交a=2；事务B读取到a=2） 同一个事务里读到了不一样的内容 针对delete update操作

3 幻读phantom read  事务B按条件匹配到了若干行记录并修改 但由于修改过程中事务A新插入了符合条件记录 导致B更新完成后发现仍有符合条件却未被更新的记录\(如一开始事务B读不到记录，A一提交 B就会读到记录\)   针对insert操作

四种隔离等级 对于三种隔离现象  
隔离等级              脏读    不可重复读  幻读  
未提交读\(read uncommitted\)  可能    可能      可能  
已提交读\(read committed\)  不可能   可能      可能  
可重复读\(repeatable read\)  不可能   不可能     可能  
可串行化\(serializable\)  不可能   不可能     不可能

innodb默认标记为可重复读 默认在可重复读的基础上**避免幻读** 所以innodb的可重复读 也没有幻读

show global variables like "%iso%" 查看当前等级

设置隔离等级  
`set global tx_isolation="READ-UNCOMMITTED";`  线上不能使用 有脏读  
`set global tx_isolation="READ-COMMITTED";`  脏读消失  
`set global tx_isolation="REPEATABLE-READ";`  
`set global tx_isolation="SERIALIZABLE";`

可串行化对并发效率太低 一般不设置  
一般设置 已提交读 和 可重复读\(默认\)

事务并发写操作 会有锁 不会同时进行 事务中 对同一条记录的修改\(读可以\)都是串行的 不存在并发  
A事务修改某个记录 先获得这个记录的锁 别的事务无法修改 不允许同时修改

回滚的实现  
回滚段rollback segment  
先把修改前的数据\(x=1\)写入回滚段\(x=1\) 再修改数据\(x=3\)  
提交前 保存了俩个版本的数据值\(一个1和一个3\)  
提交 3就能看到 1清空  
回滚 1能看到

# todo




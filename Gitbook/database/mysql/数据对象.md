# 数据对象

[课程地址](http://mooc.study.163.com/learn/NEU-1000080000?tid=2001223003#/learn/content?type=detail&id=2001414073)

**database** 数据库  
**schema** 和database是一样  
**table** 表  
**index** 索引

**多database的用途  **  
1，业务隔离，服务器上性能没有到极致  
2，资源隔离 一个database 下有如1W张表，表多 开表慢 ，比如Linux目录下文件多，ls命令 响应也慢;

**索引 **  就是数据库里目录 可以针对1个或多个字段  
数据的变更会同步索引的变更  索引多会影响写入性能

**unique**：唯一索引  
**fulltext**：全文检索索引用的不多 只支持myisam数据库  
**spatial**：地理位置索引 用的也不多 最新的mysql才支持 地理位置精度差

**索引的类别** btree,hash  
`mysql>help create index;`  
`create index on table;`  
`mysql>help alter table;`  
`alter table add index`  
``ALTER TABLE `admins_logs` ADD INDEX `i` (`username`) USING HASH ;``  
组合索引只算一个索引

**约束**  
唯一约束也是一种特殊的索引  
可以设置组合唯一索引 俩个字段组合起来不重复  
唯一约束 如果之前有重复会不成功  
添加唯一索引或者增加主键  
`alter table __ add unique key __(__);`

**外键约束**  
1 俩个表必须INNODB 别的表不支持  
2 相互约束的字段类型必须一样 ,俩张表字符编码也要一样 如 都是utf8  
3 主表的约束字段一定要有索引 否则无法成功  
4 约束名称相对库必须是唯一的，即使不在一张表上  
`mysql> alter table __ add CONSTRAINT __ Foreign KEY (__) REFERENCES __(__);`

mysql&gt; `show create table user;`

**视图**  
本身不是实际数据  
别的同事想查询数据库数据，但我们不想暴露表结构  
虚拟结构 如果一个sql特别复杂  
隐藏表结构，提高数据的安全性  
权限管理的机制 只提供部分数据  
`create view order_view as select * from 'order' where status=1`

**trigger**

触发器 数据写入A表之前或者之后做一些动作

**function**

函数 分割函数 大小写函数

**procedure**

存储过程 sql指令集 包含复杂的判断逻辑


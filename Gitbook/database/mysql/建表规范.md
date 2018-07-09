####建表规范
是与否概念字段 is_delete 1:删除;0:未删除;

表名 字段名 小写字母 数字 下划线 tb_user;

表名不用复数 表名是实体内容 不是实体数量

主键 pk_字段(primary key)
唯一索引 uk_字段(unique key)
普通索引 idx_字段(index)

小数类型为decimal 禁止float double
float double 存在精度损失的问题

存储的字符串长度几乎相等 使用char定长字符串类型

varchar可变长度字符串 不预先分配存储空间 长度不要超过5000 超过 定义字段text 独立一张表 主键来对应

必备三字段 id  gmt_create gmt_modified  
id unsigned bigint 
gmt_create date_time
gmt_modified date_time

表名 业务名称_表的作用
tiger_task tiger_reader

字段适当冗余 提高查询性能 需要保证数据一致
冗余字段 不是频繁修改的字段
不是varchar长字段

单表行数超过500万行或者单表容量超过2G 才推荐分库分表
如果三年后达不到这个级别 不要再创建时就分开分表

合适字符长度 节约空间 节约索引存储 提高检索速度

####索引规范
唯一字段必须唯一索引 即使多个字段组合
索引影响的insert速度 单可以忽略 
没有唯一索引 必然有脏数据

超过三个表 禁止join;需要join的字段 数据类型必须绝对一致;多表关联时，保证关联字段也有索引
双表join也要注意表索引

页面搜索禁止左模糊或全模糊 需要走搜索引擎
B-tree 最左前缀匹配特性 如果左边值未定 无法使用索引

order by 场景 注意索引的有序性
order by 最后的字段是组合索引的一部分 放在索引组合的最后
where a and b order by c 索引a_b_c
范围查找 索引有序性无法利用
如 where a>100 order by b

超多分页 limit 1000000,20
mysql不是跳过offset行 而是取offset+N行
放弃前offset行
先定位要获取的id

至少达到range级别 要求ref consts最好
consts 最多只有一行匹配 主键或者唯一索引
ref 普通索引 normal index
range 对索引进行范围检索
explain type=index 索引物理全扫描 慢 比range还低 和全表扫描 差不读

组合索引 区分度高的在最左边
非等号 和 等号混合判断时 等号条件放在前面

防止字段类型不同 造成隐式转换 索引失效
333 去查 "333"

####语句
不要用count(列) count(常量)代替count(*)
count(*)是sql标准统计行数语法 和数据库无关 和null非null无关
count(*)统计null
count(列)不统计null

用isnull 来对null 做判断 null和任何值比较都是null

分页时 count 为0  直接返回 不用对后面执行

不要使用外键 外键概念在应用层解决 外键不适合分布式 集群

不要使用存储过程 难以调试扩展 移植


数据订正 删除 修改 先select 出  避免误删除 加limit

避免in操作 in控制在1000个

truncate table比delete 快 不建议开发代码使用
功能和delete 不带where 语句相同

refs 阿里java开发规范

____
myisam使用非聚簇索引 非聚簇索引：索引的叶节点指向数据的引用  叶结点包含索引字段值及指向数据页数据行的逻辑指针
innodb使用聚簇索引 聚簇索引：索引的叶节点指向数据  叶子结点即存储了真实的数据行







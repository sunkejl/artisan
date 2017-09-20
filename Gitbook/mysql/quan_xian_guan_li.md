# 权限管理

[课程地址](http://mooc.study.163.com/learn/NEU-1000080000?tid=2001223003#/learn/content?type=detail&id=2001414074&cid=2001403089)

**数据库需要IP白名单**  
**用户的权限细粒度的验证**（库 表 字段 权限类型）

打印所有权限信息  

`mysql>show privileges;`

数据类型权限 应用于数据层次  

**Data Privilegges** :  
Data:select insert update delete

逻辑对象 创建表 应用于逻辑对象  

**Definition Privileges**:  
DataBase:create alter drop  
table:create alter drop  
view/function/trigger/procedure:create alter drop

管理权限  关闭数据库 主从权限 导出文件权限  
**Administrator privilges**:  
Shutdown database  
Replication slave 主从结构  
Replication client 主从结构  
File privilege 文件权限

赋权权限关键词 **grant**  
`Mysql>help grant`\#查看grant 语法

**mysql自带命令创建 用户**  
`create user 'netease'@'localhost' indentified by 'password';`未指定权限类型 密码为password  
`grant select on *.* to 'netease'@'localhost' with grant option;`第一个_是所有的database 第二个_是所有的表 赋予查询权限

select的权限开个_._  所有database.所有表  如database1.table1. @localhost ip白名单  
mysql自带命令grant赋权自动执行flush privileges

**直接改user表 来创建用户**  
根据自己的需要选择是否db和table\_pirv表插入记录 手动执行flush privileges 命令 让权限生效

**通过grant语句判断是否存在该用户，不存在就新建**  
`grant select on *.* to 'netease'@'localhost' indentified by 'password' whith grant option;` 会导致重置密码

**查看当前用户权限**  
`show grants;`

**查看别人的权限 **  
`show grants for abc@'localhost';`

**回收权限**  
`revoke select on *.* from abc@'localhost';`  
`revoke select,insert on *.* from abc@'localhost';`

**重新赋权**  
`grant insert on *.* from abc@'localhost';`

### 修改用户密码

1，用新密码，grant语句重新授权

2，更改数据库记录，update user 表的password 字段  
直接更改数据库 都需要flush,涉及表多，会导致无法连接 建议使用1

### 删除用户
```drop user```
`help drop user`帮助文档  
高危操作

**with grant option**   创建用户可以把权限给别人
允许被授权的人把这个权限授予其他人
普通用户不要加这个！！

### 权限相关的表  一个查询进来 一步一步验证用户权限

user 用户

host 白名单

password  密码

db   库相关的权限  

tables_priv  表相关的权限  

columns_priv 字段相关的权限


### 权限排查

`show create table mysql.user\G`  
验证user表  
`select * from mysql.db where user='netease'\G`  
验证db表  
`select * from mysql.db where user='netease'\G`  
验证table表  
`select * from mysql.tables_priv where user='netease'\G`

**权限管理不要操作表 统一使用mysql命令  
线上不要留test库**  
默认test库不受权限控制，存在安全风险;只有select权限 也能往test里插入数据 写爆表

### 用户赋值

普通用户 读写权限  
系统管理员super权限

普通用户不要wiht grant option 属性

线上密码要随机


# 数据类型

[课程地址](http://mooc.study.163.com/learn/NEU-1000080000?tid=2001223003#/learn/content?type=detail&id=2001414072)

[查看实践数据库表](http://mooc.study.163.com/learn/NEU-1000080000?tid=2001223003#/learn/content?type=detail&id=2001453005&cid=2001441013)

**tinyint**

1字节bytes  2的8次方的数 0-255   -128到127

**smallint**

2字节bytes 2的2\*8次方  0-65535

**mediumint**

3字节bytes 2的3\*8次方  0-16777215

**int**

4字节bytes 2的4\*8次方  0-4294967295

**bigint**

8字节 2的8\*8次方  0-18446744073709551616

int11 和int21 存储空间和存储范围都一样

int11前面会补10个0 int21会补20个0 显示上的区别

`CREATE TABLE t (a INT(11) ZEROFILL,b INT(21) ZEROFILL);`

**float\(M,D\)**: 四字节 单精度

**double\(M,D\)**:八字节 双精度

double是float的俩倍 都是非精度类型  **存储空间不会变化**  
M总精度，N小数点右边位数

**DECIMAL\(M,N\)**  高精度 工资之类   M总位数 小数点后面达到60位  
1&lt;M&lt;254  0&lt;N&lt;60 N为小数点右边的位数   
**存储空间会变化** float 和double都是定长

**ENUM** 枚举类型。定义的数量小于255 占1个字节 超过255占2字节

只能有一个值的字符串，从值列'value1'，'value2'，...，NULL中或特殊 ''错误值中选出。

**字符 字节的区别**

字节是计算机底层储存

中英文有几个就是几个字符，  
**gbk**一个中文俩个字节,  
**utf8**一个中文三个字节（是在GBK上扩展的 ） （比如俩个中文 就是2个字符×3个字节=6个字节） ，  
一个英文就是1个字节  
**utf8mb4**可以存储四个字节 如果存储的内容三个字节能包含下 就按三个字节存储

**char**  最大255字符  **存储定长** 容易浪费空间

**varchar** 存储变长 用多少给多少 **长度也算在字符里**（比如char\(1\)1个坑 varchar\(1\)**俩个坑**，还有一个坑存长度）  
存储单位为字符 **存储内容多性能不一定好** 太长会变成text

**char 和varchar** 定义的都是**字符长度**不是字节长度，中英文占的一样

> The max length of a varchar is subject to the max row size in MySQL, which is 64KB \(not counting BLOBs\):  
> VARCHAR\(65535\)  
> However, note that the limit is lower if you use a multi-byte character set:  
> VARCHAR\(21844=65535/3\) CHARACTER SET utf8

一个页16KB=16\*1024=16384byte\(字节\)=65535/4  var\_char的65535是字符长度  1byte=8bit\(比特\)

varchar text都存在行溢出 varchar特别长 性能并不比text好 varchar 短一点

整型代替字符串 性能整型要好点

text单独放在一张表里 需要再去查

tiny? text 255字节

**text**  存储单位为字节 最大655335字节约64KB 大多是溢出页 效率差 一页16KB

一行数据页内存不下 先找到数据页 根据指针 扫描溢出的数据页 性能慢 这就是溢出

mid? text  16M\(兆\)

long text 4tb

**BLOB 和BINARY** 也是溢出页 存储二进制数据 一般不用

**DATE**  三字节 2015-05-01

**TIME**  三字节 11：12：00

**TIMESTAMP** 四字节 2016-03-11 18:22:21 1970-2038年  
系统时区进行转换 会根据系统时区转换  5.6版本后支持微妙  国际化系统优先用timestamp

**DATETIME** 八字节  
2016-03-11 18:22:21 1000年-9999年 不会根据系统时区（mysql&gt;set time\_zone="+08:00"）转换  5.6版本后支持微妙

**BIGINT** 存储时间戳

**linux date函数转换timestamp**  
`date -d @14395233433`

**mysql下把当前时间转换成bigint**

`select from_unixtime(1439523443);   
select unix_timestamp(now());`

### 命令规范

表名 字段名 小写字母  
不同业务 不同前缀  
表名要有意义  
字段用全名 多个字段下划线分割

### 字段设计规范

用最小的数据类型  
整形代替字符型 整形在字段长度，索引大小开销小  
每个字段必须加注释  
大字段text单独放到一张表，单独查询 避免降低sql效率


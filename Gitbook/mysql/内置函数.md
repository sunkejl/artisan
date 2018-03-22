# 内置函数

[课程地址](http://mooc.study.163.com/learn/NEU-1000080000?tid=2001223003#/learn/content?type=detail&id=2001414077)

###聚合函数
对一组数据进行处理   返回多对一的处理结果 多个值返回一个结果              

			
select 函数function(列) from 表 
* avg()
  列的平均值
* count() 
 列的行数
* count(distinct)
 列去重后的行数
* max()
 列的最大值
* min()
 列的最小值
* sum()
 列的总和
* group_concat()
 一组值的连接字符串

```select album,sum(playcount),avg(pllaycount) from song_list group by album;```       

```select max(playcount),min(playcount) from song_list```      

常见**错误**写法        
下面是错误的 name会取第一个          
```select name,max(count) from songlist  ```           
正确的写法  **先倒序排序 再查出来 **              
```select name ,count from list order by count desc limit 1```         

**count(*) 和count(1)**           
```select count(*) from list;```和```select count(1) from list;``` 差不多,没有明显的性能差异           

**count(列)**会排除掉null的情况             
```select count(col1) from list; ```           

###group_conact()           
把name 连起来在一行里显示                 
group_contact默认**最大字符**为1024  可通过参数调整

  ```show global variables like '%concat%';```        
```select ablbum,group_concat(col1) from list group by album; ```     
   

**使用聚合函数行转列**  

user key value       
a	age		31          
a	sex		1          
a	dep		2         
b	...             
转为          
user age sex dep            
a	31	1	2            

max的作用就是取唯一不为null的数据           
```
select user,           
max(case when 'key'='age' then value end ) age,          
max(case when 'key'='sex' then value end ) sex,              
max(case when 'key'='dep' then value end ) dep,                
from list group by user;   
```        
 
###预定义函数
字符串 时间 数值的处理函数 面向单值数据 返回一对一的处理结果

字符串函数

* length()    
  列的字节数 英文是单字节的 别的语言是多字节
* char_length()  
  字符数
* trim() rtrim() ltrim()    
* substring()       
  select sbustring('abcd',3，2); 从第三个字符截取2个字符       
* locate()       
  定位字符串  selct locate('bar','footbar');    查询子字符串在原字符串中的位置   
* replace()  
  替换字符 
* lowwer() upper()  
  转大小写  


时间处理函数
* curdate()
 当前日期
* curtime()
 当前时间
* now()
  当前时间日期
* unix_timestamp()
  当前时间戳1970 - 现在
* date_formate()
 支持很多种输出
* date_add()
  指定日期往后加一段时间
* date_sub()
   指定日期往前加一段时间

```select curdate();```     

```select now();```       
 
```select unix_timestamp();```    
     
```select date_format('2009-10-24 22:23:00','%W %M %Y');```**输出星期几**      
   
```select date_format('2009-10-24 22:23:00','%H %i %s');``` **输出时分秒** 
       
[查看data_format支持的格式的官方文档](http://dev.mysql.com/doc/refman/5.7/en/date-and-time-functions.html#function_date-format)

```SELECT NOW() + INTERVAL 1 MONTH;``` interval为时间运算的关键字

```SELECT NOW() - INTERVAL 1 WEEK;```

###数字处理函数
* abs()
 绝对值
* ceil()
 向上取整
* round()
 四舍五入
* pow(num,n)
 num的n次幂 pow (2,2)=4
* floor()
 向下取整
* mod(n,m)
 取模(返回n%m)
* rand()
 默认0-1的随机小数    
 
  ```select 1+ceil(rand()*4);```
  
  取1-5之间的随机数



###比较运算
* is,is not
 判断布尔 **不能=null 只能is not null**
* >,>=
 大于 大于等于
* <.<=
 小于 小于等于
* =
  等于
* !=,<>
 不等于
* between m and n
  取m n之间值
* in,not in
  是否单个值 in 是一组值 

```select * from play_list where (createtime between 1427791323 and 1430383307) and userid in (1,3,5);```





###算术 逻辑运算

```select 4+3*2;```

```select 1 or 0;```

[官方手册](http://dev.mysql.com/doc/refman/5.7/en/)


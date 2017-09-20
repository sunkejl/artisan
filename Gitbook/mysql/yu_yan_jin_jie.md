# 语言进阶

[课程地址](http://mooc.study.163.com/learn/NEU-1000080000?tid=2001223003#/learn/content?type=detail&id=2001414076)

上一条插入语句的id
```select last_insert_id();```

可以和商品实践结合
group by聚合函数 所以下面的语句加max group_concat把多条记录合并,以逗号分隔!!!
```
select o.order_id,max(o.order_state) order_state,group_concat(g.goods_name ) goods_list from tb_order o,tb_order_item oi,tb_goods g  where o.order_
id=oi.order_id and oi.goods_id = g.goods_id  and o.account_id=1 group by o.order_id,o.order_state  order by o.create_time  desc 
```

查看商品购买数量
```
 select g.goods_id ,max(g.goods_name) goods_name,sum(oi.goods_quantity ) from tb_order_item oi,tb_goods g  where  oi.goods_id = g.goods_id
group by g.goods_id ,g.goods_name order by sum(oi.goods_quantity ) desc 
```

查看总销售额
```
select sum(oi.goods_quantity ),sum(oi.goods_amount) from 
tb_order_item oi  
```

按商品类别查看销售额
```
select gc.category_name,sum(oi.goods_quantity ),sum(oi.goods_amount)
 from tb_order_item oi,tb_goods g, tb_goods_category gc where oi.goods_id = g.goods_id and g.category_id = gc.category_id
 group by gc.category_name
 ```
 
 输出商品名，超过5个字符的名称后面用...代替
 case when ... else ... end
```
 select case when CHAR_LENGTH(goods_name)<5 then goods_name else concat(SUBSTRING(goods_name,1,5) ,'...') end goods_name from tb_goods 
 ```
 
 查看30天以内的订单清单
```
select * from tb_order where create_time>(now()-interval 30 day)
```

新增订单时相应减去库存，如果库存已经降到0则不更新。
```
delimiter //  
DROP TRIGGER trg_ins_tb_order_item;//
CREATE TRIGGER trg_ins_tb_order_item
BEFORE INSERT ON `tb_order_item`
FOR EACH ROW
BEGIN
 DECLARE i INT;  
 SET i = 0;
 select store_quantity into i from tb_goods where goods_id=NEW.goods_id ;
 IF i-NEW.goods_quantity > 0 THEN
  UPDATE tb_goods set store_quantity=store_quantity-NEW.goods_quantity where goods_id=NEW.goods_id ;
 ELSE
  SIGNAL SQLSTATE 'HY000' SET MESSAGE_TEXT = '库存不足';
 END IF;
END;//
delimiter ;
```

### order by

`select * from table order by a,b`  
//a相等时 对b排序 默认升序

### distinct 对多个字段进行**去重**   后台会进行排序  大表慎重

`select distinct userid from play_list`  
`select distinct userid,play_name from play_list`

### groupby 分组 可以单列 也可以**多列** 多列 就是唯一组合值 一般用于统计

select 必须带上**分组字段**如userid **聚合函数**操作 如max count  也可以多列分组 唯一组合值进行分组

`select userid,max(count) from play_ist group by userid` 计算最大值最小值

`select userid,count(*) from play_list group by userid` count\(\*\)查看每个分组的数量

**group by userid having** 分组的条件查询  
`select userid,count(*) from play_list group by userid having count(*)>=2;`查询count\(\*\)俩个以上的数据

### like

模糊查询 类似正则表达式 会对表里数据全都查询一遍 没办法是用索引 大表不行

%abc% 模糊匹配   a% **前缀**匹配   %b**后缀**匹配

**\_**代替单个字符  **\[charlist\]**中括号里任何单一字符  
**\[!charlist\]**或者**\[\^charlist\]** \为md加的转义实际不需要 不在中括号中的任何单一字符

### limit offset

limit 10 offset 6 分页 **从第6个开始找10个 **   
offest偏移量不能过大 如果设置1W 就会**先扫描**前1W行

### case when

null 的判断必须是is null  
类似if else  
对sql的输出结果进行选择判断  
通过end 结束  
`select case when count is null then 0 else count end from play_list;`如果为空显示0

### select 语法

`SELECT [ALL | DISTINCT | DISTINCTROW ]  
      [HIGH_PRIORITY]  
      [STRAIGHT_JOIN]  
      [SQL_SMALL_RESULT] [SQL_BIG_RESULT] [SQL_BUFFER_RESULT]  
      [SQL_CACHE | SQL_NO_CACHE] [SQL_CALC_FOUND_ROWS]  
    select_expr [, select_expr ...]  
    [FROM table_references  
      [PARTITION partition_list]  
    [WHERE where_condition]  
    [GROUP BY {col_name | expr | position}  
      [ASC | DESC], ... [WITH ROLLUP]]  
    [HAVING where_condition]  
    [ORDER BY {col_name | expr | position}  
      [ASC | DESC], ...]  
    [LIMIT {[offset,] row_count | row_count OFFSET offset}]  
    [PROCEDURE procedure_name(argument_list)]  
    [INTO OUTFILE 'file_name'  
        [CHARACTER SET charset_name]  
        export_options  
      | INTO DUMPFILE 'file_name'  
      | INTO var_name [, var_name]]  
    [FOR UPDATE | LOCK IN SHARE MODE]]`

### join 连接

实现原理：先选择驱动表 依次遍历 循环 数据量小的作为**驱动表**（mysql自动）驱动表肯定是要遍历一遍  
**内连接** 连接字段在俩个表里**都有**才会返回  
俩种写法  

`select a.id from air a,bread b where a.id = b.id and a.name=123;`  

`select a,id from air a join bread b on a.id=b.id where a.name=123;`

**左连接** 从**左表**中返回所有的行，即使有表中没有匹配的行 相关表数据为**null**  

**右连接** 从**右表**中返回所有的行，即使有表中没有匹配的行 相关表数据为**null**

如果出现一级二级菜单的需求，可以自己连接自己

```
select cate2.category_name,cate3.category_name from  tb_goods_category cate2,tb_goods_category cate3  where cate2.category_id = cate3.upper_category_id and cate2.category_level=2 and cate3.category_level=3 and cate2.upper_category_id=1;
```


### 子查询

内存查询的结果作为外层的条件 子查询易于理解 一般子查询都可以转换成连接 **推荐用连接**  
性能劣势  驱动表 自己定义好了  不一定拿数据小的做驱动  

`select userid from play_fav where play_id =(select id from play_list where play_name='abc');`

### union

不同表 相同字段聚合在一个表里    字段要相同类型  
默认会对结果**去重,;union all** 会显示所有不去重  

`sellect userid fron play_list union select userid fron play_fav;`

### DML进阶

**多值插入** 一条语句完成插入减少和数据库交互次数提高效率  

`insert into a values(1,2),(2,3)`  

**覆盖插入** 简化业务逻辑判断  比如主键重复会报错 这俩种可避免  这个为覆盖  

`replace into table values ()`  

**忽略插入** 简化业务逻辑判断  比如主键重复会报错 这俩种可避免  这个为忽略 不产生结果 不报错  

`insert ignore into table values ()`  

**查询插入** 倒表结构 复制B表到A表  

`insert into a select * from b;`  

**主键重复 **则update: 遇到主键重复 选择更新几个字段    

`insert into table tbl values(1,col1_value,col2_value) on duplicate key update  col1=col1_value`

**update连表更新**  
tbl\_b表的age 更新tbl\_a表的age  

`update tab_a,tab_b set tab_a.age =tab_b.age where tab_a.id =tab_b.id`

**update连表删除**  

根据tab\_b的name删除tab\_a的字段  

`delete tbl_a from tab_a,tab_b where tab_a.id =tab_b.id and tab_b.name=123;`


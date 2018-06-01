# 商品表实践


###层级菜单展示

[课程地址](http://mooc.study.163.com/learn/NEU-1000080000?tid=2001223003#/learn/content?type=detail&id=2001452008)

a) 显示一级菜单。
```mysql> select * from  tb_goods_category  where category_level=1;```

b) 显示二级/三级菜单 
**自关联** 内连接

```mysql> select cate2.category_name,cate3.category_name from  tb_goods_category cate2,tb_goods_category cate3  where cate2.category_id = cate3.upper_category_id and cate2.category_level=2 and cate3.category_level=3 and cate2.upper_category_id=1;```

+---------------+---------------+         
| category_name | category_name |          
+---------------+---------------+         
| 洗护用品      | 洗发护发   |          
| 洗护用品      | 沐浴      |             
| 洗护用品      | 牙刷      |             
+---------------+---------------+                  

**左连接**
```
mysql> select cate2.category_name,cate3.category_name from  tb_goods_category cate2 left join tb_goods_category cate3  on cate2.category_id = cate3.upper_category_id where cate2.category_level=2 and cate2.upper_category_id=1;
```
+---------------+---------------+          
| category_name | category_name |           
+---------------+---------------+             
| 洗护用品      | 洗发护发      |            
| 洗护用品      | 沐浴          |             
| 洗护用品      | 牙刷          |             
| 个人用品      | NULL          |               
| 家居电器      | NULL          |               
+---------------+---------------+               



按分类展示商品  加入选择字段

```mysql> select * from tb_goods where category_id=6;```

```select * from tb_goods where category_id=6 order by goods_name;
select goods_id,goods_name,pic_url,store_quantity,goods_note from tb_goods where category_id=6 and producer = 'pro1';```

```select goods_id,goods_name,pic_url,store_quantity,goods_note from tb_goods where category_id=6 and producer = 'pro1' and store_quantity>0 ;```

购买商品，创建订单

```insert into tb_order(account_id,create_time,order_amount,order_state ,update_time ,order_ip,pay_method ,user_notes ) values(1,now(),2000,1,now(),'127.0.0.1','paypal','测试订单');```

```select last_insert_id();``` **返回上一条插入的sql**

```insert into tb_order_item(order_id,goods_id ,goods_quantity,goods_amount) values(1,1,4,800);```

```insert into tb_order_item(order_id,goods_id ,goods_quantity,goods_amount) values(1,2,3,1200);```

查看订单 group by 在select里除了条件id外 一般用函数  **group_concat**会把结果都查询出来 以逗号分隔

```select * from tb_order where account_id=1 order by create_time  desc ;```

三表查询
```
select 
o.order_id,
max(o.order_state) order_state,
group_concat(g.goods_name ) goods_list
from
tb_order o,tb_order_item oi,tb_goods g 
where 
o.order_id=oi.order_id 
and oi.goods_id = g.goods_id  
and o.account_id=1 
group by o.order_id,o.order_state  
order by o.create_time  desc ;
```


查看商品购买数量

``` 
select
g.goods_id ,
max(g.goods_name) goods_name,
sum(oi.goods_quantity ) 
from tb_order_item oi,tb_goods g  
where  oi.goods_id = g.goods_id
group by g.goods_id ,g.goods_name 
order by sum(oi.goods_quantity ) desc ;
```

查看总销售额 **统计** sum 聚合函数
```
select sum(oi.goods_quantity ),sum(oi.goods_amount) from 
tb_order_item oi  ;
```
按商品类别查看销售额  三张表联查

```
select 
gc.category_name,sum(oi.goods_quantity ),sum(oi.goods_amount)
from tb_order_item oi,tb_goods g, tb_goods_category gc
where
oi.goods_id = g.goods_id 
and g.category_id = gc.category_id
group by gc.category_name;
```


输出商品名，超过5个字符的名称后面用...代替       
**CHAR_LENGTH**字符数  **length** 字节数          
**substring** 截取字符串  **concat**拼接字符串                 

``` 
select case when CHAR_LENGTH(goods_name)<5 then goods_name else concat(SUBSTRING(goods_name,1,5) ,'...') end goods_name from tb_goods ;
```

查看30天以内的订单清单

```select * from tb_order where create_time>(now()-interval 30 day);```


触发器 新增订单时相应减去库存，如果库存已经降到0则不更新。

```delimiter //  
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
delimiter ; ```






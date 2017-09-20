### 触发器

[课程地址](http://mooc.study.163.com/learn/NEU-1000080000?tid=2001223003#/learn/content?type=detail&id=2001414078)


### 触发器      
insert update delete

**前或者后**时触发 执行一组sql 

做数据订正(保证数据完整)，如果小于0 纠正它         

迁移表 插入A表同时插入B表 实现迁移 
                
 
```delimiter //```   

修改结束符(默认是;分号 由于触发器里面有一组sql语言会有;所以要修改结束符)         

new.col更新以后的列值      

old.col更新以前的列值(只读)         

查看已有的触发器         


```show triggers;```            

```delimiter //           
CREATE TRIGGER trg_upd_score              
BEFORE UPDATE ON `stu`             
FOR EACH ROW             
BEGIN               
    IF NEW.score < 0 THEN             
        SET NEW.score = 0;               
    ELSEIF NEW.score > 100 THEN            
        SET NEW.score = 100;           
    END IF;           
END;//                
delimiter ; ```                

**触发器注意事项**       
高并发 有损耗      
  
同一类事件(如insert)在一个表里只能创建一次触发器
     
事务表 触发器执行失败 整个语句回滚 
         
ROW格式的主从复制，触发器不会在库上执行    
      
防止递归执行(自己调用自己)，如在update是触发,然后执行update      
     
  
 

### 存储过程          

查看有哪些存储过程

```show procedure status; ```      
      
```show create procedure proc_test1;```     

存储过程是存储在数据库端的一组sql语句集        
可以使用流控制语句           
提高数据安全 屏蔽程序直接对表操作           
减少网络传输，减少db访问           
提高了代码维护的复杂度           

```
DROP PROCEDURE IF EXISTS `proc_test1`;
DELIMITER ;;
CREATE   PROCEDURE `proc_test1`(IN total INT,OUT res INT)
BEGIN   
    DECLARE i INT;  
    SET i = 1; 
    SET res = 1; 
    IF total <= 0 THEN   
        SET total = 1;   
    END IF;   
    WHILE i <= total DO
        SET res = res * i;
        INSERT INTO tbl_proc_test(num) VALUES (res);  
        SET i = i + 1;
    END WHILE;
END
;;
DELIMITER ;
```
 
**调用存储过程 **      

```set @total=1;```    

```set @res=2; ```    
 
```call pro_tesg1;```   
   
```select @res; ```          
 
 
 
 
**流控制语言  **       

```if  then  elseif  then  else   end if      ```     

```case when then else  end  case```         
 
```while   do   end while ```             

```repeat   repeat   until    end   repeat ```            
 
 

### 自定义函数

自定义函数和存储过程类似 但必须带上返回值 return            
使用 select function(val);          
可能在遍历数据是使用 注意性能损耗            


场景:不利于水平扩展，多用于统计和运维操作          

 
# 安装和连接 

[课程地址 ](http://mooc.study.163.com/learn/NEU-1000077004?tid=2001224000#/learn/announce)

Export PATH=$PATH:/usr/local/mysql/bin

**sql缩写**： structured query language 
 
**ddl**： data definition language 创建 删除 修改表     

```create | drop | alter```

**dml**： data manipulation language 插入 修改 删除 表的记录    
 
```select | insert | update | delete```

**dcl**： data control language 控制数据库的访问权限      
  
```grant | revoke```

**tcl**： transaction control language 控制事务进展    
    
```commit | rollback```

**select** 查询    
 
mysql用来解决较大数据量，事务控制，网络访问，持久化，安全，并发访问的查询语言;        
 
关系型数据库mysql和非关系型redis mongoDB hadoop**区别在于是否使用SQL**      
 
**ubuntu搜索mysql安装包** ```apt-cache search mysql-server```     
 
**查看mysql-client是否安装**          
```mysql -V ```
 
**查看sock文件**         

1,```mysqld --verbose --help | grep ^socket ```         

2,```ps -ef|grep mysql ```         

或者进入mysql后查看sock文件路径   socket权限需要777
重启mysql会重新生成socket文件
        
1,
```
status
```
 查看       
2,
```
show global variables like 'socket'
 ```           

socket 权限777
 
**连接mysql的俩种方式**  sock连接和TCP连接

**mysql 默认端口** 3006
 
**sock 连接mysql**               
                
```mysql -S/var/run/mysqld/mysqld.sock -u root -p ```
 
**TCP连接mysql**     
        
```mysql -h192.168.9.78 -P3306 -uroot -p    ```

**linux下搜素历史命令**                
```ctrl +s ```
 
**进入mysql 后输出下列命令，查看状态和帮助**        
 
```
status;
 
help;
 
help select;#select帮助信息
```
 
**查看当前连接的用户 长连接语句**          
```show processlist; ```
 
在用户目录下 /home/sk .bash_history 保存历史命令   
         
**清除历史命令**     
                                                                    
```history -c ```
 
###查看wanrnings

```show warnings;```

 
 
**可视化工具**           
 navicat   
 mysqlworkbench  使用 17：00 开始

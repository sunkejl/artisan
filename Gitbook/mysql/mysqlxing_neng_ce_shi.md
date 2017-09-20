# mysql性能测试

硬件设备层的测试  服务器 磁盘性能  拼命写数据测试

业务层的测试 测试代码性能  

数据库层的测试  mysql测试  不同版本 功能不一样 选择哪个版本 分支 测试不同参数配置

mysql测试分类

cpu bound测试 测试数据远小于配置内存大小 测试尽量通过内存

io bound测试 测试数据量远大于内存 大量数据从磁盘读取和写入  生产环境都是这种情况

测试时间>60min 减少误差
sysbench测试mysql性能 TPCC更接近业务
测试时监控服务器负载




写入测试
更新测试
纯读测试
混合模式 以上三者都有  

测试工具sysbench tpcc-mysql mysqlslap(官方提供 用处不多)


服务吞吐量 
TPS 每秒事务总量
QPS 每秒请求量 比如一个事务里有10个请求 10TPS就是100QPS

服务响应时间

服务并发性

### 
SYSBENCH


可以测试磁盘 CUP 数据库
支持ORACL MYSQL
建议0.5版本

1.ubuntu apt-get install sysbench
2.源码安装 报错 解决办法 #vim sysbench-0.4.12/configure.ac  #AC_PROG_LIBTOOL   AC_PROG_RANLIB 

1)下载sysbench
git clone https://github.com/akopytov/sysbench.git
2)编译&安装(yum安装Mysql 编译保存)
./autogen.sh
./configure --prefix=/home/ddb/tmp/sysbench
make && make install
3)./sysbench --help
4)初始化数据
sysbench --test=parallel_prepare.lua --oltp_tables_count=1 --rand-init=on --oltp-table-size=500000000 --mysql-host=127.0.0.1 --mysql-port=3306 --mysql-user=root --mysql-password= --mysql-db=test --max-requests=0 prepare
5)运行测试
sysbench --test=oltp.lua --oltp_tables_count=1 --num-threads=100 --oltp-table-size=500000000 --oltp-read-only=off --report-interval=10 --rand-type=uniform --mysql-host=127.0.0.1 --mysql-port=3306 --mysql-user=sys --mysql-password=netease --mysql-db=sbtest --max-time=1000 --max-requests=0 run
6)数据清理
sysbench --test=parallel_prepare.lua --oltp_tables_count=1 --rand-init=on --oltp-table-size=500000000 --mysql-host=127.0.0.1 --mysql-port=3306 --mysql-user=sys --mysql-password=netease --mysql-db=sbtest --max-requests=0 cleanup

初始化数据 测试  清理数据(手动删除 或者用上面的命令清理)


ubuntu 命令(0.4版本)
初始化数据
sysbench --test=oltp  --oltp-table-size=500000000 --mysql-host=127.0.0.1 --mysql-port=3306 --mysql-user=root --mysql-password= --mysql-db=test --max-requests=1000 prepare

ubuntu 命令(1.0版本)
初始化数据
 ./sysbench --test=parallel_prepare.lua  --oltp_tables_count=1  --rand-init=on  --oltp-table-size=50  --mysql-host=127.0.0.1  --mysql-port=3306  --mysql-user=root --mysql-password=123456 --mysql-db=sbtest --max-requests=1000 prepare
![](http://7xsqmn.com1.z0.glb.clouddn.com/sysbenc.PNG)


sysbench --test=oltp.lua --oltp_tables_count=2 --num-threads=100 --oltp-table-size=50 --oltp-read-only=off --report-interval=10 --rand-type=uniform --mysql-host=127.0.0.1 --mysql-port=3306 --mysql-user=root --mysql-password=123456 --mysql-db=sbtest --max-time=1000 --max-requests=0 run

![](http://7xsqmn.com1.z0.glb.clouddn.com/sysbenc_run.PNG)

sysbench局限性 表结构只有一种 SQL语句简单 







TPCC 专门针对交易处理系统(OLTP系统)的规范
安装
bzr branch lp:~percona-dev/perconatools/tpcc-mysql


1)下载Tpcc-mysql
bzr branch lp:~percona-dev/perconatools/tpcc-mysql
2)编译安装
cd src
make
export LD_LIBRARY_PATH=$MYSQL_HOME/lib
export C_INCLUDE_PATH=$MYSQL_HOME/include
export PATH=$MYSQL_HOME/bin:$PATH
3)创建表结构和索引
mysql>create database tpcc;
mysql>source create_table.sql
mysql>source add_fkey_idx.sql
4)导数据
./tpcc_load [server] [DB] [user] [pass] [warehouse_num]（仓库数量）
./tpcc_load 127.0.0.1 tpcc root 123456 1


5)运行测试
./tpcc_start -h server_host -P port -d database_name -u mysql_user -p mysql_password -w warehouse -c connections -r warmup_time -I running_time -i report-interval -f report-file

![](http://7xsqmn.com1.z0.glb.clouddn.com/tpcc.PNG)


业务的读写比例对数据库资源选型的影响是
读多写少的业务通常更依赖于buffer pool缓存数据，因此对于内存和CPU要求更高 
机械磁盘顺序写的吞吐量和iops通常比随机读写更高

容量评估需要做好哪些准备？
业务数据规模和访问量评估
业务性能测试方案和环境搭建
单实例MySQL能够支撑的最大请求和延迟
业务请求转化到数据库请求的比例和规模

LRU链表长度反应的是刷脏页的比例，不能用于衡量最终的性能。
事务回滚数反馈的是业务指标，不是性能指标

服务器资源选型的性能指标主要包括：
磁盘IO性能
网络吞吐量与响应时间

对于大表分页查询，可以采用的优化措施包括：
选择表中一个高选择性的索引字段，每次分页使用该字段作范围查询条件
避免一次查询并显示所有的页数。
数据量大时一次缓存所有数据可能会把内存撑爆，而且初次载入速度会很慢，用户可能不需要一次看所有的数据。
数据量较大时offset较大后性能很差，会扫描offset之前的数据。















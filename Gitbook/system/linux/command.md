date
cal
df
free
cd -
cd ~
ls /opt  /opt/www
alias foo='cd /opt;ls;cd -'
type foo
unalias foo
 
vim /root/.bashrc  (不会消失)
 
ll /opt/www/ >l_test.txt
 >test.txt      (创建新文件)
 ll /opt/www/ >>l_test.txt  (不覆盖 更新)
 
 type php
 which php
 
 
  help cd
  cd --help
  man cd
 
file index.txt
 
ln test.php test.phpc  硬链接
ln -s test.php test.phpc  软连接
 
!! 上一条命令
!1085 执行1085条 
history |less
 
 
http://www.apelearn.com/study_v2/chapter11.html
 
service rsyslog start  記錄登錄檔的服務
 
tail -f : 动态显示文件的最后十行
 
tar zcvf afcajax.tar.gz afcajax
tar zxvf afcajax.tar.gz
 
ctrl  +a |+e  命令行
 
 !! 连续两个 ‘!’, 表示执行上一条指令；
 
  !n 这里的n是数字，表示执行命令历史中第n条指令
  
定时任务
setup      |查看system services   tab退出
 
 
/etc 下面 cron.daily cron.hourly  系统自己每天 每小时需要执行的脚本  自己建的脚本也可放进去
 
cat /etc/crontab  crontab 格式
 
iotop 检查磁盘
磁盘io是 瓶颈 最慢的一块
 
 1012  yum list | grep iotop
 1013  yum install -y iotop
 1014  iotop
 
 查看端口
 
 netstat -tupln  列出端口和协议
 
  lsof -i      查看打开的网络服务
  
  
  查看cpu 信息
  
  cat /proc/cpuinfo
  
  lscpu 命令查看cpu信息
  
  硬盘性能查看
  
  dd if=/dev/zero of=testfile bs=1M count=512 conv=fdatasync   #/dev/zero 空的目录   conv 不使用内存缓存
  
  hdparm -t /dev/sda        #t磁盘速度       | T 内存速度
  
  
  netstat   #-a全部 t tcp     u udp  l正在被监听（系统服务） n不进行解析
  
  udp无状态协议 tcp有状态协议
  
  
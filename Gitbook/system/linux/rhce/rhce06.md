ACL 访问控制列表

getfacl dir1/  查看acl权限

setfacl -m u:jack:r dir1/

acl 优先

setfacl -x 取消用户acl权限

---

文件 是静态的数据

进程 是动态的

可能执行文件加载到内存

进程 可执行程序在运行过程中的一个实例化

1 分配的内存空间  可能几秒结束 也可能一直存在  不能靠时间判断

2  拥有权凭证和特权   哪个用户启用它 就有特权

3 一个或多个线程 线程执行子进程

4 进程状态

运行进程的环境

1 本地和全局的变量

2 当前进程调度上下文

3 分配资源

进程标识 pid

UID GID 决定文件系统的存取权限 通常集成执行用户的权限

ps 查看进程

-a 所有终端进程

-u 所有者信息

-x 不属于终端的  比如后台运行的东西

pstree 树形显示

ps -ef 显示ppid 父进程的id

pgrep sshd

ps -f 1406

ps -f $\( pgrep sshd\)

pgrep -U root

pgrep -G root

pidof bash

进程状态

R可运行

S睡眠

T挂起

Z僵尸

D不可中断睡眠

l 多线程

进程通讯

-15 发送给自己终止 整洁终止 可能被拒绝  优先15 不能用9

-9 发送给主进程 立刻终止 可能会留下僵尸进程

-1 重读配置文件

18 继续

19暂停

man 7 signal   完整列表

kill 发送命令

kill  -15 pid

killall  -15 sshd 不用 pid号

---

调优  -20～19 优先级对cpu访问  0不对进程做优先级调整

cpu 加载进程  通过队列

ps o user,command,nice

nice -n 5 command

renice 5 pid 已启用的进程

只有root可以调整  子进程也会受影响

---

top 缺点 不能做到整体输出   ps可以ps &gt; process.log

jobs 后台程序   程序加& 扔进后台

bg %2  后台程序启用

fg %2   调到前台

kill -19 %1   %+jobs 里的序号

ctrl +z  扔到后台 但处于暂停 需要bg启动

---

systemd  initd   管理环境

initd 主干进程  init 0   会产生进程碎片 管理有难度

0 halt 关机

1 single单用户 只有root能够使用 安全模式

2 multiuser without NFS 无网络的多用户模式

3 multiuser 多用户

4 unset 保留

5 x window 图形化

6 reboot 重启

systemd

启动系统时 并行启动 。一个进程没起来会 会等待

按需启动进程 不需要单独服务

完全自动化管理服务的依赖关系

劣势

特定需求无法满足

大部分守护进程以“d”结束

systemd pid 为1

server name start  启动守护进程  stop restart（重启） reload\(重载\)  status

restart 先stop 然后start

reload 先挂起 加载配置文件 启动 pid不变

systemctl start name  name为守护进程的服务

systemctl status sshd  查看进程

systemctl stop sshd  停止进程

checkconfig name on 开机启动

systemctl enable sshd 开机启动

systemctl disable sshd不开机启动  不把配置项加载到etc下

---

日志  存在/var/log/下

/etc/init.d/rsyslog status 日志的进程

/etc/rsyslog.conf  日志进程的配置文件

mail \* @192.168.1.1 upd  远程保存日志

mail \* @@192.168.1.1  tcp mail \* @192.168.1.1

journalctl 查看全部日志

journalctl -n 5 查看5条

journalctl  -f 实时查看

---

timedatectl   输出详细 信息

ntp 时钟同步 校正时间  时区

timedatectl list-timezone

timedatectl set timezone  \*\*\*\*

timedatectl set-ntp true 时钟同步

也可以通过配置文件管理

---

磁盘管理

启动

bios 基础输入输出系统

basic input output system

bootloader   在mbr里 主引导记录 。一次分区后存在mbr 512字节 bootloader占446\(512-64-2\)

partiton 16\*4=64字节

俩个字节的控制位 2字节

分区 引导内核 内核初始化 启动pid=1的进程

以只读方式挂载文件 等启动完 重新挂载

---

开机 破解root密码  第一道题

e编辑

倒数 第二行最后位置 rd.break

ctrl+x执行

mount -o remount ,rw /sysroot

chroot /sysroot

passwd root

touch /.autorelabel

exit

exit


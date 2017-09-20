smpt 简单邮件传输协议

邮件服务 的基本配置

simple mail transfer protocol

无法存贮邮件

无法检索邮件

无法使用用户账户认证

esmpt extend

加了用户认证

pop3:post office protocol 邮局协议

imap4 interet mail access protocol

mua: mail user agent 邮件用户代理

outlook express

foxmail

thunderbird

mta: mail transfer agent 邮件传输代理

exchange

sendmail

postfix

qmail

exim

mda: mail delivery agent 邮件投递代理

mua -&gt; mta \(sina给sina 直接给 sina给live 找dns  用smtp给live的mta   mta收到邮件 给mda mda投递到对应的邮筒\)

yum install postfix

vim etc/postfix/man.cf 邮件主配置文件

myorigin =   伪装发送地址

inet\_interface =  监听地址 改自己 或者邮件接收服务器 或者改成all

mydestination   接收哪些

mail -s "hello" sunkejl@liv.com &lt;&lt;END

today

END

---

计划任务

cron 实现任务自动执行

一般系统自带

时间表

-bash: mail: 未找到命令

参考格式

vim /etc/crontab  可以看到如下内容

Example of job definition:

.---------------- minute \(0 - 59\)

\|  .------------- hour \(0 - 23\)

\|  \|  .---------- day of month \(1 - 31\)

\|  \|  \|  .------- month \(1 - 12\) OR jan,feb,mar,apr ...

\|  \|  \|  \|  .---- day of week \(0 - 6\) \(Sunday=0 or 7\) OR sun,mon,tue,wed,thu,fri,sat

\|  \|  \|  \|  \|

\*  \*  \*  \*  \* user-name  command to be execute

\*匹配所有

， 1，3，5 星期1,3,5执行

-2-7 2-7 礼拜二到礼拜天

／频率 ／3 每隔三天

0 17 \* \* 1-5 周一到周五 17点 0分

30 8 \* \* 1,3,5 每周一三五8点30

0 8-18/2 \* \* \* 8点-18点 每隔两小时执行

0 \* \*/3 \* \* 每三天 每个0分

crontab -e -u user1   \#-u指定用户 -e edit

crontab -l -u user1 \#查看user1 所有的脚本

全剧配置/etc/crontab

var/spoll/cron/  下面保存cron -e 写在里面

系统 默认设置 。位于 /etc/cron.\*

tmpwatch 清理制定缓存  清理/tmp

logrotate 清理日志

dmesg 查看计算机信息 cpu 磁盘

uptime 开机多长时间

anacron 系统 关机 时间 未执行的cron任务 自动执行

crontab 不是vim 打开的话可以

The`crontab -e`command will check the environment variables`$EDITOR`and`$VISUAL`for an override of the default text editor, so...

```
export VISUAL=vim
```

or

```
export EDITOR=vim
```

---

at

脚本名称/etc/init.d/atd

at  now+5min   一次性脚本 时间定义灵活

---

时钟同步

服务端装

yum install ntp

systemctl start ntpd

systemctl enable ntpd

客户端

yum install chrony

systemctl start chronyd

systemctl enable chronyd

vim /etc/chrony.conf

不用的server 注释掉

添加

server 172.16.1.100 iburst

systemctl restart chronyd

chronyc source -v  查看同步表

---

iscsi 服务

http://www.361way.com/rhel7-iscsi/4728.html

scsi加了一个网络服务

SCSI:小型计算机系统的接口 （Small Computer System Interface）

ISCSI（Internent Small Computer System Interface）较SCSI协议多了一个Internet，就是基于以太网传输的SCSI协议。

输入输出  技术

磁盘阵列

把所有硬盘串联在一起  一般接16个设备 最后位置 不接磁盘320mb/s 总线是瓶颈

sas 1Gb/s

san storage area network   \(Storage Area Networks, 储存局域网络\)  SAN 是提供『磁盘 \(block device\)』给主机用

对 SAN 提供的磁盘进行分割与格式化等动作  不能对NAS 提供的文件系统格式化     SAN 最大的目的就是在提供磁盘给服务器主机使用

nas network attached storage 网络附加存储   服务器 存储分配  NAS 提供的是『网络协议的文件系统 \(NFS, SMB...\)』

iSCSI target  就是储存设备端，存放磁盘或 RAID 的设备，目前也能够将 Linux 主机仿真成 iSCSI target 了！目的在提供其他主机使用的『磁盘』

iSCSI initiator 就是能够使用 target 的客户端，通常是服务器。 也就是说，想要连接到 iSCSI target 的服务器，也必须要安装 iSCSI initiator 的相关功能后才能够使用 iSCSI target 提供的磁盘就是了。

客户端安装

yum install targetcli.noarch

fdisk /dev/sda 划分区

targetcli

/backstorage/block create station.disk1 /dev/sda5  \#创建后段卷

IQN 设备唯一识别号

/iscsi create iqn.2017-05.com.example:station1  反写域名+主机名称

/iscsi/qin.2017-05.com.example.station1/tpgl/acls create iqn.2017-05.com.example:station2 \#创建station2

/iscsi/iqn.2017-05.com.example.station1/tpg/luns create /backstorage/block/station.disk1

/iscsi/iqn.2017-05.com.example.station1/tpg/portal create 172.25.1.100:3260 \#自己的地址和 出端口

saveconfig

exit

systemctl start target

systemctl enable target

vim /etc/iscsi/initiatormname.iscsi

客户端 写 客户端iqn

iqn


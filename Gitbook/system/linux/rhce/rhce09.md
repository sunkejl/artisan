NFS

ftp  file transfer protocol 没有安全认证 没有用户认证  工作在应用层 基于udp

连接和传输 俩个线路 端口最高65535

主动 模式     &gt;1024端口给server 21端口 发请求 20端口和另一个&gt;1024端口 连接

被动模式    &gt;1024端口给server 21端口 &gt;1024的随机高端口 和另一个&gt;1024端口 连接  更安全 一般在这个模式

samba

文件 系统共享服务

smtp simple mail transfer protocol 最早传输协议 目前仍在用 不能传大

---

# ftp

vsftpd  very secury ftp  加了用户认证

守护进程 /user/sbin/vsftpd

yum install lftp \#客户端

yum install vsftpd \#服务端

vi /etc/vsftpd/vsftpd.conf

vi /etc/vsftpd/user\_list \#denied

\# If userlist\_deny=NO, only allow users in this file

\# If userlist\_deny=YES \(default\), never allow users in this file, and

\[root@localhost ~\]\# systemctl start vsftpd

\[root@localhost ~\]\# systemctl enable vsftpd \#顺手 自己启动 开机启动

lftp 172.20.10.5

get  test1

put test1

\[root@localhost opt\]\# useradd -s /sbin/nologin ftpuser \#开启不能登录的用户

\[root@localhost opt\]\# passwd ftpuser

lftp -u ftpuser 172.20.10.5

---

# nfs

nfs 服务 network file service / system   只能linux 和linux之间通讯

rpc:remote procudure call 远程过程调用  底层调用的rpc

nfs 端口 tcp 2049

配置文件 /etc/exports

软件包 nfs-utils

vim /etc/exports \#几种写法

/ngsshare 172.25.1.101 rw,sync,no\__root squash_

/myshare  172.25.1.101

/myshare  172.25.1.0

/myshare  \*

/myshare  172.25.1.101\(rw\)

rw  \|  ro read only

sync \| async

no\__root squash 不压缩root权限_

??

setenforce 0

systemctl stop firewalld

\[root@localhost ~\]\# systemctl start nfs-server

\[root@localhost ~\]\# systemctl enable nfs-server  一定要做

客户端 yum install rpcbind

shwomount -e 172.25.1.102 查看 挂载列表



# 1种 通过 挂载 连接

vim /etc/fstab

172.20.10.5:/myshare /mnt1  nfs default 0 0

mount -a



为某个用户 添加权限

setfacl -m u:client:rw /share

getfacl /share  查看文件权限

# 

# 1种通过 autofs 连接

autofs

yum install autofs

vim /etc/auto.master

```
/home/fsfile  /etc/auto.nfs
```

vim /etc/auto,misc

nfslocal   -fsytpe =nfs.rw.soft.intr    172.25.1.102:/myshare

systemctl start autofs

systemctl enable autofs

需要 cd 触发一下

\#todo

---

# Samba服务

在 Unix Like 上面可以分享档案数据的 file system 是 NFS，那么在 Windows 上面使用的『网络上的芳邻』所使用的文件系统则称为 Common Internet File System, CIFS

Server Message Block \(SMB\)

netBIOS 网络基础输入输出系统  主动发的广播包 让局域网用户   都认识自己 。对应nmb

samba 中linux 和windows通讯 靠的netBIOS   SMB和clsf 都依赖netBIOS

SMB : service message block 服务信息块   数据以块的方式发出

cifs ： common internet file system  仅仅是文件系统 Common Internet File System, CIFS  微软的文件系统 常见如网上邻居

软件包  samba,samba-common,samba-client

守护进程 /usr/sbin/nmbd,/usr/sbin/smbd

服务器功能，就是最重要的权限管理 \(smbd\) 以及 NetBIOS name 查询 \(nmbd\) 两个重要的服务程序；

yum install samba samba-common samba-client

udp 137 138 netBIOS占用

tcp139 smb 使用

tcp 445 cifs使用

```
netstat -tlunp | grep mbd
```

配置文件   /etc/samba/\*

vim /etc/samba/smb.conf

security = user  \#share已抛弃 全部共享

browseable = no \#可浏览

vim /etc/samba/smb.conf

```
[temp]<==分享资源名称
```

\[home\]家目录

```
[sk]
        comment = sk share
        path = /tmp
        writable = yes
```

windows \172.16.54.235\sk

```
testparm 测试samba.cnf 的语法
```

先普通用户 再做成samba用户

SAMBA 上面的使用者账号，必须要是 Linux 账号中的一个

\[root@localhost ~\]\# useradd smbuser

\[root@localhost ~\]\# smbpasswd -a smbuser

\[root@localhost ~\]\# systemctl start smb nmb

\[root@localhost ~\]\# systemctl enable smb nmb

setfacl -m u:smbuser:rwx /smbshare

客户端 要装cifs

yum install cifs-\* \#全部装上

可以写在autofs上

也可以写在fstab

vim /et/fstab

ip地址 可以写hostname

//172.25.1.102/smbshare /mnt  cifs  defaults,multiuser,username=smbuser,password=123456 0 0

不需要密码登录

修改smb.cnf  security = share

fstab

//172.16.54.235/sk    /smb\_tmp                cifs    guest 0 0

mount -a

cifscreds add 172.25.1.102

认证

出现mount error\(13\) permission denied

改成share 换目录 成功

[https://wiki.ubuntu.com/MountWindowsSharesPermanently](https://wiki.ubuntu.com/MountWindowsSharesPermanently)

centos

\[root@www ~\]\# /etc/init.d/smb start

\[root@www ~\]\# /etc/init.d/nmb start

\[root@www ~\]\# chkconfig smb on

\[root@www ~\]\# chkconfig nmb on

chkconfig smb on 表示在各个等级都启动

smbstatus SAMBA 有多少人来联机

systemctl start firewalld  查看防火墙状态

systemctl stop firewalld  查看防火墙状态

systemctl status firewalld  查看防火墙状态


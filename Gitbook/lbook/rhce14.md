ssh -X 连接 。可以复制粘贴

1配置selinux

enforcing

reboot

2ssh

俩台机器都要做

vim /etc/hosts.allow

添加一行 任意位置 sshd:.example.com

vim /etc/hosts.deny

添加 sshd:.cracker.com

3 自定义用户环境

全局命令

vim /etc/bashrc\#重启可以

alias qstat='/bin/'\#单引号 双引号都一样

source /etc/bashrc

4端口转发

5链路聚合 。就是双网卡绑定

nmcli-con-add      ... '{"runner":{"name":"activebackup"}}'\#最外层单引号

然后配ip

一定要带掩码/24  固定255.255.255.0

system2 上 只要把ip改掉 别的照样输入

6配置ipv6

练习是俩个:: 考试给什么就输入什么

先nmcli-con show 查看eth0的connect name

改manual模式

7配置本地邮件服务

8samba

yum install samba samba-client

mkdir /common

chcon -t  \#更改common目录标签

vim /etc/samba/smb.conf

workgroup=staff

\[\]

path=/common

hosts.allow=192.168.0.    //hosts.allow=.example.com   可以写域名

browseable=yes

:wq

smbpasswd -a harray   \#实验环境不一定有harray

9多用户samba挂载

认证用户 =用harray来挂载

samba 和 文件都需要 设置文件权限

挂载

yum install clis-\*

vim /etc/fstab

10配置nfs服务  \(不需要装服务?\)

下载下来 名字一定叫krb5.keytab wget -O

"V 4.2" 大写v 空格4.2

网段 都网段 。Ip都IP

上午 11 12 13做完再做这题 。时钟  system1和system2都要时钟同步（考试时 不用时钟同步）

11挂载nfs

安装 的服务名和10不一样

先找服务端  再找客户端 再找防火墙 问题

12 配置web站点 有录音

documentroot为／var/www/html/ 直接download过去

创建辅助配置文件

order deny,allow 先拒绝 再允许 。没有被拒绝 就被允许

用了directory 不需要下面的firewall 的\#配置

13配置 完全web服务

yum install mod\_ssl

ssl.conf 有一些备注 路径 可以看

改成\*

sshonorcipherorder on 去掉注释 支持80 443同时访问

路径名称改掉

服务restart httpd

证书 一般600 不改也没事

14 配置虚拟主机

没有目录 创建

setfacl -m u:

vim /etc/httpd/conf.d/vv.conf \#都写在一个文件里

15 配置web内容访问

order allow,deny 先允许再拒绝 没允许的都是拒绝

firefox

[http://server.example/private](http://server.example/private)

16 实现动态web内容

selinux 对文件 标签 端口 有控制

yum install mod\_wsgi

semanage port -a -l \|grep 80 看80端口标签

17 创建脚本

\#！ /bin/bash

1&gt;&2

18

$\# 位置参数  带"" -eq 0   \[  \] 和语句间带空格

变量 大写

$NAME 变量值

19 配置iSCSI服务端

3260 端口 默认

不能格式化

分区 刷新分区表 停

/backstores/block 必须 create

20 配置iSCSI的客户端

连上2g的盘

yum -y install iscsi-\*

vim

InitatorName= //修改 不要新增

出错 先删 /etc/iscsi/initatorname.iscsi  再 yum remove iscsi-\*

通过 man iscsiadm 来找example

改man 命令中的ip

discover 先

login 再

vim /etc/fstab

/dev/sda1 /mnt/data ext4 defaults,\__netdev 0 0_

\_netdev 说明是网络挂载过来的

21 配置 数据库

yum groupinstall -y mariadb mariadb-client

22 查询

防火墙

systemctl start firewalld

systemctl enable firewalld

firewall-config 打开图形化

先改成per 下拉 永久设置

认识的都钩上

port端口

3260 iscisc

8998 apacha端口

端口转发

option   reload 防火墙


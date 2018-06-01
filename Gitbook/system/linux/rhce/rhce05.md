用户 识别使用者身份

认证系统 。验证用户身份

授权

认证

审计  记录管理员和用户的操作行为

3a认证

把磁盘中的一个文件加到内存中 成为进程

uid username shell

0 root  /bin/bash

1-999  sysuser系统用户 不能登录 /sbin/nologin

1000+ normaluser  /bin/bash

用不能独立 必须属于一个组

/etc/passwd文件

用户名  密码 uid groupid 用户身份注释

root:x:0:0:root:/root:/bin/bash

组的文件

/etc/group

sk1 组里不显示sk1的用户

密码的文件 md5加密

/etc/shadow

17220 为1970到现在的天数

0和99999密码最短和最长时间

7密码过期前多少天提醒

sshd:\*:17220:0:99999:7:::

/etc/gshadow 组的密码文件

/etc/login.defs 用户创建时的默认属性

---

useradd 创建用户

id sk 查看sk的uid

没有密码的用户 不能本地登陆

passwd sk1 设置新密码

创建用户

1/etc/passwd

2/etc/shadow

3/etc/group

4/etc/gshadow

创建 /home/sk1的文件

cp -r /etc/ske1/.\* /home/sk1/

改变 目录及子目录 所属者／所属组

---

useradd

-c 用户描述

-u 指定uid

-d 指定用户的家目录\(父目录必须先存在 不会主动创建不存在目录\)

-s 指定用户的登录shell    -s /sbin/nologin

-G 指定用户的附加组

-e  指定用户到期时间

-f  密码过期宽限期 0立刻锁定

---

usermod

-L 锁定账号

-U 解锁账号

-s 修改用户登录shell

-d 修改家目录 加-m 移动家目录 \(父目录必须存在 不会创建不存在目录\)

-G  做的是覆盖操作 原来在user1组 会丢失 需要再加一次  usermod -G user3,User4 user5  直接改文件 加用户最方便

---

userdel  单独使用 用户家目录保留 用户邮箱保留

-r   删除干净 一般都加上

---

groupadd

groupmod  -n 修改组名

groupdel  不用加r

---

监控

w 当前登录的用户

last

---

权限

如果uid匹配 用户权限适用

如果 gid 匹配 用户组权限适用

如果 都不匹配 其他 适用

三位 三位

rwx r-x r-x

文件  r 可读                                    w 可写可删除            x 可执行 前提文件是可执行文件                  - 没有权限

目录 r 可列出目录内容 \(ls\)         w 可删除目录 改名                     x可以进入目录 \(cd\)  - 没有权限

user\(owener\)  拥有者

group  所属组

other 其他

-文件

d目录

b块设备

c字符设备

s 套接字文件socket

l 链接文件link

p 管道文件 pipe

---

chown 修改所属者

su - user2 切换用户

chgrp 修改所属组

mkdir -p /dir1/dir2

chmod 修改所有权限

俩种模式：1字母 2数字

u  user

g  group

o other

a 代表all

+

-

r w x

ug+x

chmod ugo+w dir2/

chmod go-rwx dir2/

chmod a-w dir2

数字模式

r  4

w 2

x  1

rw- r-- r--

110 100 100  二进制 有就是1

420=6 400=4  400=4

0=0 1=1 10=2 11=3 100=4 101=5 110=6 111=7

---

默认权限

文件666

目录777

root 644      umask 022  666-022=644   777-022=755

vim .bashrc  \| /etc/.bashrc  /umask

---

sudo /etc/sudoers

sbin 下系统命令   显示other可以执行 但其实不能执行  系统命令 和隐藏权限有关

特殊权限

suid    文件  作用用户  使用文件时 当前使用者 暂时获得这个文件所有者权限 。chmod u+s /sbin/fdisk   rws       u-s

sgid     目录   作用组  该目录下的子目录和文件会继承父目录的组  自动改组 不管创建人是谁 。 chmod g+s /data/newhome  r-s

sbit       目录  该目录下创建的文件只能被所属者和root删除   chmod a+d newhome

useradd use1

echo "123456"\|passwd --stdin user1    不用输俩次密码

ll -d /root






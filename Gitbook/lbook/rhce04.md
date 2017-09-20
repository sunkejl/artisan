wall 全局广播

查看目录下的目录数 -c 统计  ll \| grep -c "^d"

---

rpm

var/lib/rpm 安装数据库信息

rpm -ql 查看包里的东西

rpm -qf /var/ww 查看由哪个包安装出来

rpm -i 安装  --install

rpm -F 升级  --freshen

rpm -e 移除   --erase     PACKAGE\_NAME

本地有 \*\*\*.rpm文件

---

yum

基于rpm系统上的软件包  自动计算依赖关系

/etc/yum.repos.d

vim package.repo

\[package\]

name=rhel7 local source

baseurl=file://  \| http:// \| ftp://     \#!要写全地址

光盘 挂载到／cdrom

baseulr=file::///cdrom   \#file:// + /mnt

enable=0  \| 1开启

gpgcheck=0  \|本地不校验 网上的校验

:wq

yum clean all 清理缓存

yum repolist

yum install

yum list

yum remove

yum info

yum search

yum grouplist 组包列表

yum groupinstall 安装组包

---

cd /dev

cdrom \| sr0      光盘设备

file cdrom 是sr0的软连接

mount /dev/sr0 /mnt

umount 卸载挂载  不能在挂载的目录

vim /etc/fstab   永久挂载配置

blkid 查看设备uuid 设备的type

df 查看磁盘使用量

df -Th   挂载完才能看到

插入 u盘 /dev/ 找sdb开头的 。sda为默认的

---

普通用户加入root组没有root的权限

用户能用sudo运行命令的权限  即使没有文件权限 但有运行命令的权限

uid  username  shell

0  root   /bin/shell

1-999 sysuser /sbin/noloin 不能登录

1000+ noramluser   /bin/shell


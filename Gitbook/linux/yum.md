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


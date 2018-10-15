useradd sunke
passwd sunke
vim /etc/passwd
vim /etc/shadow
 
 
usermod -L sunke  禁用权限    shadow 下会多!
usermod -U sunke  解锁
userdel sunke
在 添加 用户 的 时候 系统 默认 会 创建 一个 与 用户 名 一样 的 用户 组。
新增 用户 组 的 命令 是 groupadd
 
users
who 
w
 
tail -f /var/log/cron
 
chown www test.php 改变拥有者
chown :www test.php 改变拥有组
加 -R 把整个目录也改了
 
查找
find /opt/www/ -name test.php
locate test.php  ==> 需要updatedb
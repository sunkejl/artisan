\[网上地址\]\([http://www.linuxprobe.com/chapter-06.html](http://www.linuxprobe.com/chapter-06.html%29%29\)

\[鸟哥磁盘地址\]\([http://cn.linux.vbird.org/linux\_basic/0230filesystem\_3.php\](http://cn.linux.vbird.org/linux_basic/0230filesystem_3.php%29\)

inode 节点 软连接\(inode 到另一个inode 删除一个，另一个不可以\) 硬连接\(inode到实际的block 删除一个入口 另一个 可以访问\) 存储文件大小权限等ls的内容

bitmap位图\( 存储哪个block可写 用111111011111  0表示那个块可写\)

block 不会物理删除 断开和inode的关联 实际数据的存储位置

要真实清空 不停创建文件 覆盖原来的block

主分区 可以存 扩展分区 不能存 用来接着创建主分区 会产生分区表

sda1 第一块硬盘的第一个分区

sdb2 第二块硬盘的第二个分区

fdisk /dev/sdb

可以写+1G 和+512M 选起始 和 终止位置

格式化文件系统 。ext 最大支持50T       xfs最大支持500T

partprobe 同步  partprobe则可以使kernel重新读取分区 信息，从而避免重启系统。

mkfs.ext4 /dev/sdb1  格式化成需要的文件系统 make file system

分区  fdisk

同步   partprobe

格式化  mkfs

挂载

vim /etc/fstab 永久挂载

// fstab 配置文件解读 :  [https://wiki.archlinux.org/index.php/Fstab\_\(简体中文\](https://wiki.archlinux.org/index.php/Fstab_%28简体中文%29\)

mount

-a    挂载所有在/etc/fstab中定义的文件系统

umount 撤销挂载

\*\*\*

---

swap 交换空间  提供内存给cpu使用

SWAP交换分区  虚拟内存

使用SWAP交换分区专用的格式化mkswap命令进行格式化操作

mkswap /dev/sdb3  \#格式化操作

swapon /dev/sdb2      交换分区挂载 到系统

free -m 命令来看到交换分区大小的变化

vim /etc/fstab

/dev/sdb3 swap\(需要填这个\)

```
/dev/sdb2 swap swap defaults 0 0
```

swapon  -a

-a, --all All devices marked as \`\`swap'' in /etc/fstab are made available

swapon  -s

-s, --summary  Display swap usage summary by device.

t

82 swap

---

ln -s testfile a.txt  创建软连接  认不出绝对路径 第二个路径不能写绝对路径  硬连接没有这个要求

跨分区做链接只能做软连接

ln testfile a.txt 创建硬连接

软连接 可以通过 文件后面的-&gt; 来看 。硬连接看不出

locate 不是实时的

find

find -name snow  查找当前目录

find -iname snow  忽略大小写 当前目录查找

find / -name snow 根目录找

find -o 表示或者 -not\(!\)表示否定

find -user skcdian -not -group root 找所有者是 所属组不是  的文件

find atime mtime ctime 元数据  inode里的数据 。文件数据 block数据

find -user client  -exec mv {} /tmp    \#\是 -exec 的结束 。 {} 指的之前找到的所有内容

\*\*\*

归档

tar

tar -cvf  test.tar /etc/

tar -xvf  test.tar /tmp/

gzip test.tar 压缩

tar -zcvf  test.tar.gz /etc/  gzip

tar -zxvf  test.tar.gz /tmp/

z gzip .    j bzip

俩种压缩命令 考一个

\*\*\*

rsync 比scp快  同步俩个文件不同的地方

scp 完全复制 更加保险

dump  磁盘备份

restore 磁盘恢复

\*\*\*

lvm 逻辑卷管理

block device

physical volumes

volome group

logical volumes

1T+1T+2T  动态调整大小

pvcreate /dev/sdb1 /dev/sdb2  做成物理卷

pvdisplay

vgcreate  vgname /dev/sdb1 /dev/sdb2

vgdisplay

lvcreate 创建逻辑卷

lvcreate -L 2500M -n lv1 vgname

lvdisplay

mkfs.ext4 /dev/vgname/lv1

mount

df -Th   显示所有

扩展大小

lvextend -L\(直接指定容量\)   扩展逻辑卷

lvextend -L 2800M /dev/vgname/lv1

ext 使用resize2fs ／dev/vgname/lv1   使扩容生效

xfs 使用growfs

确认文件系统 。df -Th

扩展逻辑卷  扩展卷组

---

主要启动记录区\(Master Boot Record, MBR\)：可以安装启动管理程序的地方，有446 bytes

分区表\(partition table\)：记录整颗硬盘分割的状态，有64 bytes

由於分割表就只有64 bytes而已，最多只能容纳四笔分割的记录， 这四个分割的记录被称为主要\(Primary\)或延伸\(Extended\)分割槽。

扩展分配的想法是：

既然第一个磁区所在的分割表只能记录四笔数据， 那我可否利用额外的磁区来记录更多的分割资讯

因为前面四个号码都是保留给Primary或Extended用的嘛！ 所以

逻辑分割槽的装置名称号码就由5号开始了

---

**BIOS**：启动主动运行的韧体，会认识第一个可启动的装置；

**MBR**：第一个可启动装置的第一个磁区内的主要启动记录区块，内含启动管理程序；

**启动管理程序\(boot loader\)**：一支可读取核心文件来运行的软件；

**核心文件**：开始操作系统的功能...

权限与属性放置到 inode 中，至于实际数据则放置到 data block 区块中

df：列出文件系统的整体磁盘使用量；df -Th   显示所有  查看file system  查看下挂载状态和硬盘使用量信息。

```
-T  ：连同该 partition 的 filesystem 名称 (例如 ext3) 也列出； print file system type
-h  : 以人们较易阅读的 GBytes, MBytes, KBytes 等格式自行显示
```

du：评估文件系统的磁盘使用量\(常用在推估目录所占容量\)   **du命令用于查看文件的数据占用量，格式为：“ du \[选项\] \[文件\]”。**

```
root@sk-VirtualBox:~# du -sh /opt/*
347M    /opt/adminTest
20K     /opt/C
182M    /opt/google
16K     /opt/mordenPHP
18M     /opt/VBoxGuestAdditions-5.0.24
1.4G    /opt/www
```

fdisk  -l       查阅目前系统内的所有 partition

扩展分配最好能够包含所有\# 未分割的区间；所以在这个练习中，我们将所有未配置的磁柱都给了这个分割槽  所以在开始/结束磁柱的位置上，按下两个\[enter\]用默认值即可！

扩展分区中用L 逻辑卷分区

1-4 号尚有剩余，且系统未有 extended：此时会出现让你挑选 Primary / Extended 的项目，且你可以指定 1~4 号间的号码；

1-4 号尚有剩余，且系统有 extended：此时会出现让你挑选 Primary / Logical 的项目；若选择 p 则你还需要指定 1~4 号间的号码； 若选择 l\(L的小写\) 则不需要配置号码，因为系统会自动指定逻辑分割槽的文件名号码；

1-4 没有剩余，且系统有 extended：此时不会让你挑选分割槽类型，直接会进入 logical 的分割槽形式。

文件系统的格式化make filesystem           mkfs

partprobe       &lt;==强制让核心重新捉一次 partition table

/etc/fstab

/dev/sdb2   /sdb2   ext4   defaults 0 0

mount -a

---

硬盘设备则是由大量的扇区组成的，其中第一个扇区最重要，它里面保存着主引导记录与分区表信息。单个扇区容量为512bytes组成，主引导记录需要占用446bytes，分区表的为64bytes，结束符占用2bytes，而其中每记录一个分区信息需要16bytes，最多只能建四个分区

**mount /dev/sdb2  /sdb2**

umount /dev/sdb2


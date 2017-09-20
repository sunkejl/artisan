上午19道题目

恢复root 密码  \#RHCE 06

---

df -Th 查看文件系统类型  
物理卷Physical volume \(PV\)：可以在上面建立卷组的媒介，可以是硬盘分区，也可以是硬盘本身或者回环文件

卷组Volume group \(VG\)：将一组物理卷收集为一个管理单元

逻辑卷Logical volume \(LV\)：虚拟分区，由物理区域（physical extents）组成。

卷组 逻辑卷

---

useradd 默认会建立组

useradd -G附属组 -g私有组        -G 补充组  -g 第一次组

useradd -s /sbin/nologin sarah 不可交互shell

---

setfacl -m \(modify\) u:natasha:rw /var/tmp/fstab

setfacl -m u:harry:- /var/tmp/fstab

getfacl 查看

---

crontab -e\(edit\) -u\(指定user\) natasha

分时日月周 /命令

crontab -l -u natasha 查看

---

创建的目录 自动设置组

chmod 2770 /home/admins  \#2  目录下面创建的目录

ls -ld /home    \#d查看当前目录 不看下面的子目录

---

yum -y update kernel

过程慢

reboot

authconfig-gtk 图形化配置 。

su - ldapuserX X为机器号 数字

---

参数iburst 不成功 重试

systemctl enable chronyd

chronyc 手动同步

useradd -u 1234 alex  指定uid

---

找关键字grep

文件 find

find / -user natasha -exec\(执行命令\) cp -rp\(p保留权限\) {} \(指代前面find 的内容\) /root/findfile/ \\(-exec的语法结束符\)

&gt;重定向 不存在的文件会创建出来

---

fdisk -l 查看分区情况

fdisk /dev/sdb

最多只有4个主分区

三个主分区 加e 扩展分区

扩展分区划分逻辑分区

partprobe

/dev/卷组名称/逻辑卷名称

---

lan

添加

服务  客户 陪在一个lan区段里

我已移动 改虚拟机

root

123456

startx 启动图形化

ssh -X\(图形化\) root@192.168.0.170

ctrl+alt+t  一个termal打开俩个主机

---

swap  rhce 07



上午 最后一题 320M  给俩倍的大小


RHCE   7.0  考试
考试环境介绍：

1、考试分为上午RHCSA考试，下午RHCE考试 

2、考试时间上午2.5小时，下午3.5个小时 

3、总分都是300分，>=210成绩就算通过考试 

4、准备签字笔、身份证 

5、考试时要填写姓名（拼音）与邮箱，请注意保持一致 

6、每人一台物理机，考试都是在虚拟机里面操作。物理机上有各种图标，来用操作虚拟机，比如重启，关机，重置等。 

7、考试中如有不清楚请及时与考官联系 

注意：

1. 所有的光盘中的软件包考试的时候会给出

2. 升级软件包所在目录也会给出

3. 你可以用真实机来验证虚拟机中的考试实验是否正确完成

4. 考题中出现的 X，是你宿主机的IP 地址主机位

5. example.com 域所在的网络是192.168.0.0/24

cracker.com 域所在的网络是172.16.0.0/16，一般在题意中被要求拒绝的网络

6. RHCSA 部分，在system1 主机上完成

RHCE 部分，在system1 和system2 上完成

考试注意看清在哪台机器上做哪题，别做错或者多做了。

1. 配置SELinux
SElinux必须在两个系统中运行Enfocing模式 

 setenforce 1

 vi  /etc/selinux/config

 SELINUX=enforcing

2. 配置SSH访问
按以下要求配置SSH访问 

A 用户能够从域example.com 内的客户端通过SSH远程访问您的两个虚拟机系统 

B 在域cracker.com内的客户端不能访问您的两个虚拟机系统

 在system1和system2上做，

 vim /etc/hosts.allow

 添加sshd: .example.com

 vim /etc/hosts.deny

 添加sshd : .cracker.com

3. 自定义用户环境
在系统system1和system2上创建自定义命名为qstat 此自定义命令将执行以下命令： 

A /bin/ps  –Ao pid,tt,user,fname,rsz 

B 此命令对系统中所有用户有效。

 修改/etc/bashrc，在尾部加上一条alias即可

 vi   /etc/bashrc

 alias  qstat='/bin/ps -Ao pid,tt,user,fname,rsz'

 source /etc/bashrc

4. 端口转发
在系统ststem1配置端口转发，要求如下: 

A 在网络中的系统，访问system1 的本地端口5230将被转发到222 

B 此设置必须永久有效

 使用图形化界面做，运行firewall-config

 添加本地转发，添加端口

5. 配置聚合链路
在system1和system2上按以下要求配置一个链路： 

A 此链路使用接口eth1和eth2 

B 此链路在一个接口失败时仍然能工作 

C 此链路在system1使用下面的地址192.168.10.150+X/255.255.255.0 

D 此链路在system2使用下面的地址192.168.10.200+X/255.255.255.0 

E 此链路在系统重启之后依然保持正常状态

 在system1上做，

 nmcli con add type team con-name team1 ifname team1 config ‘{“runner”:{“name”:”activebackup”}}’

 nmcli con mod team1 ipv4.addresses ‘192.168.10.150+X/24’

 nmcli con mod team1 ipv4.method manual

 nmcli con add type team-slave ifname eth1 master team1

 nmcli con add type team-slave ifname eth2 master team1

 nmcli con up team1

 teamdctl team1 state

 同理在system2上操作，

6. 配置ipv6地址
在您的考试系统上配置接口eth0使用下列Ipv6地址：

A system1上的地址应该是::192.168.0.150+X/64 

B system2上的地址应该是::192.168.0.200+X/64 

C 地址必须在重启后依旧生效

D 两个系统必须保持当前的Ipv4地址并能通信。

在system1上做，

nmcli  con show

nmcli con mod ‘System eth0’ ipv6.addresses '::192.168.0.150+X/64' 

nmcli con mod ‘System eth0’ ipv6.method manual 

在system2上做，

nmcli con mod  ‘System eth0’  ipv6.addresses '::192.168.0.200+X/64' 

nmcli con mod  ‘System eth0’  ipv6.method manual 

7. 配置本地邮件服务
在系统system1和system2上配置邮件服务，满足以下要求： 

A 这些系统不接收外部发送来的邮件 

B 在这些系统上本地发送的任何邮件都会自动路由到classroom.example.com 

C 在这些系统上发送的邮件显示来自于serverX.example.com 

 在system1上做，

 postfix的配置文件是：/etc/postfix/main.cf

 vim /etc/postfix/main.cf

 inet_interfaces=loopback-only  //116行

 local_transport=error: local delivery disabled  //无此行，请自行添加

 relayhost=[classroom.example.com]  //317行

 myorigin=serverX.example.com  //98行

 mydestination=  //164行

 mynetworks=127.0.0.0/8,  [::1]/128  //264行

 systemctl  restart  postfix

 systemctl  enable  postfix

 firewall-cmd  --permanent  --add-services=smtp

 firewall-cmd  --reload

 同理在system2上做，

8. 通过SMB共享目录
在system1上配置SMB服务 

您的SMB服务器必须是STAFF工作组的一个成员 

共享/common目录共享名必须为common 

只有example.com域内的客户端可以访问common共享 

common必须是可以浏览的 

用户harry必须能够读取共享中的内容，如果需要的话，验证的密码是redhat 

 在system1上做，

 yum –y install samba samba-client

 mkdir /common

 chcon  -t samba_share_t /common //更改common目录的标签

 vim /etc/samba/smb.conf  //samba的主配置文件

 修改global下面的

 workgroup = STAFF

 在文件最后下添加，

 [common]

 path = /common

 hosts allow = 192.168.0.  //hosts allow = .example.com

 browseable = yes

 :wq

 smbpasswd –a harry

 systemctl start smb nmb

 systemctl enable smb nmb

 firewall-cmd   --permanent   --add-service=samba

 firewall-cmd   --permanent   --add-service=mountd

 firewall-cmd   --reload

9. 配置多用户SMB挂载
在system1共享通过SMB目录/devops满足以下要求 

A 共享名为devops 

B 共享目录devops只能被example.com域中的客户端使用 

C 共享目录devops必须可以被浏览 

D 用户harry必须能以读的方式访问此共享，访问密码是redhat

E 用户natasha必须能以读写的方式访问此共享，访问密码是123

此共享永久挂载在system2上的/mnt/multi目录，并使用用户harry作为认证任何用户可以通过用户natasha来临时获取写的权限 

 在system1上做，

 mkdir /devops

 chcon -t samba_share_t /devops

 vim /etc/samba/smb.conf

 在文件最后下添加，

 [devops]

 path = /devops

 hosts allow = 192.168.0.

 browseable = yes

 write list = natasha

 :wq

 chmod o=rwx /devops //setfacl -m u:natasha:rwx /devops

 smbpasswd –a harry

 smbpasswd –a natasha

 systemctl restart smb nmb

 在system2上做,

 yum –y install cifs-* //包名称:cifs-utlis

 vim /etc/fstab

 //system1的IP/devops(共享名)  /mnt/multi  cifs defaults,multiuser,username=harry,password=redhat,sec=ntlmssp  0  0

 mkdir  /mnt/multi

 mount -a

 df -hT

 su – natasha

 cifscreds   add    system1的IP

10. 配置NFS服务
在system1配置NFS服务，要求如下：

A 以只读的方式共享目录/public 同时只能被example.com域中的系统访问

B 以读写的方式共享目录/protected 能被example.com域中的系统访问

C 访问/protected需要通过kerberos安全加密，您可以使用下面的URL提供的密钥

http://classroom.example.com/pub/nfssecure/krb5.keytab 

D 目录/protected 应该包含名为project 拥有人为ldapuserX的子目录

E 用户ldapuserX能以读写方式访问/protected/project

 在system1上做，

 mkdir /public

 mkdir –p /protected/project

 chcon –t public_content_t /protected/project //用户ldapuserX能以读写方式访问/protected/project

 wget  –O  /etc/krb5.keytab   http://classroom.example.com/pub/nfssecure/krb5.keytab

 vim /etc/sysconfig/nfs 

 设置RPCNFSDARGS=”-V  4.2” //用户ldapuserX能以读写方式访问/protected/project

 vim /etc/exports

 /public  *.example.com(ro,sync)

 /protected  *.example.com(sec=krb5p,rw)  //kerberos安全加密

 :wq

 chown  ldapuserX  /protected/project

 systemctl start nfs-server nfs-secure-server

 systemctl enable nfs-server nfs-secure-server

 firewall-cmd   --permanent   --add-service=nfs

 firewall-cmd   --permanent   --add-service=rpc-bind

 firewall-cmd   --permanent   --add-service=mountd

 firewall-cmd   --reload

 showmount –e 127.0.0.1

11. 挂载一个NFS共享
在system2上挂载一个来自system1上的NFS共享，并符合下列要求： 

A /public 挂载在下面的目录上/mnt/nfsmount 

B /protected挂载在下面的目录上/mnt/nfssecure并使用安全的方式。密钥下载URL如下：http://classroom.example.com/pub/ nfssecure/krb5.keytab 

C 这些文件系统在系统启动时自动挂载 

 在system2上做,

 showmount –e system1的IP

 systemctl start nfs-secure

 systemctl enable nfs-secure

 wget –O /etc/krb5.keytab  http://classroom.example.com/pub/nfssecure/krb5.keytab

 mkdir /mnt/nfsmount //挂载点

 mkdir /mnt/nfssecure //挂载点

 vim /etc/fstab

 system1的IP:/public  /mnt/nfsmount  nfs  defaults  0  0

 system1的IP:/protected  /mnt/nfssecure  nfs  defaults,sec=krb5p,v4.2  0  0

 :wq

 mount –a

12. 配置web站点
System1上配置一个站点http://serverX.example.com然后执行下述步骤： 

从http://classroom.example.com/pub/example.html下载文件，并且将文件重命名index.html不要修改此文件的内容 

将文件index.html拷贝到您的web服务器的documentroot目录下 

来自于example.com域的客户端可以访问此Web服务 

来自于cracker.com域的客户端拒绝访问此Web服务 

 在system1上做， 

 yum –y install httpd

 systemctl start httpd

 systemctl enable httpd

 vim /etc/httpd/conf.d/vv.conf //文件以.conf结尾

 <virtualhost   *:80>

 documentroot /var/www/html

 servername serverX.example.com

 <directory /var/www/html>

  order deny,allow

  deny from 172.16.0.0/16

  allow from 192.168.0.0/24

 </directory>

 </virtualhost>

 wget –O /var/www/html/index.html   http://classroom.example.com/pub/example.html

 #firewall-cmd --permanent --add-rich-rule='rule family=ipv4 source address=172.16.0.0/16 service name="http" log level=notice reject' //man firewalld.richlanguage

 #firewall-cmd --permanent --add-rich-rule='rule family=ipv4 source address=192.168.0.0/24 service name="http" log level=notice accept' //man firewalld.richlanguage

 firewall-cmd   --permanent   --add-service=http

 firewall-cmd   --reload

 或用图形化：firewall-config

 在system2上打开firefox查看,

13. 配置安全web服务
为站点http://serverX.example.com配置TLS加密一个已签名证书从http://classroom.example.com/pub/certs/serverX.crt获取，此证书的密钥从http://classroom.example.com/pub/keys/serverX.key获取， 此证书的签名授权信息从http://classroom.example.com/pub/example-ca.crt获取 

 在system1上做， 

 yum –y install mod_ssl

 wget  –O /etc/pki/tls/certs/serverX.crt   http://classroom.example.com/pub/certs/serverX.crt

 wget  –O /etc/pki/tls/private/serverX.key   http://classroom.example.com/pub/keys/serverX.key

 wget  –O /etc/pki/tls/certs/example-ca.crt  http://classroom.example.com/pub/example-ca.crt

 chmod  600  /etc/pki/tls/certs/*.crt 

 chmod  600  /etc/pki/tls/private/*.key

 vim / etc/httpd/conf.d/ssl.conf

 <VirtualHost  *:443>

 SSLEngine on

 SSLProtocol all -SSLv2  –SSLv3

 SSLCipherSuite HIGH:MEDIUM:!aNULL:!MD5

 SSLHonorCipherOrder on  //去掉注释的#

 SSLCertificateFile   /etc/pki/tls/certs/serverX.crt

 SSLCertificateKeyFile   /etc/pki/tls/private/serverX.key

 SSLCertificateChainFile   /etc/pki/tls/certs/example-ca.crt

 DocumentRoot  /var/www/html  //去掉注释的#

 ServerName  serverX.example.com  //去掉注释的#

 <directory /var/www/html>

  order deny,allow

  deny from 172.16.0.0/16

  allow from 192.168.0.0/24

 </directory>

 </VirtualHost>

 firewall-cmd   --permanent --add-service=https

 firewall-cmd   --reload

 在system2上打开firefox查看结果，

14. 配置虚拟主机
在system1上扩展您的web服务器，为站点http://wwwX.example.com创建一个虚拟主机，然后执行下述步骤： 

A 设置DocumentRoot为/var/www/virtual 

B 从http://classroom.example.com/pub/virtual.html 下载文件并重命名为index.html 不要对文件index.html的内容做任何修改 

C 将文件index.html放到虚拟主机的DocumentRoot 目录下 

D 确保natasha用户能够在/var/www/virtual目录下创建文件 

注意：原始站点http://serverX.example.com必须仍然能够访问 

 在system1上做， 

 mkdir /var/www/virtual

 wget -O /var/www/virtual/index.html http:// classroom.example.com/pub/virtual.html

 setfacl –m u:natasha:rwx /var/www/virtual

 vim / etc/httpd/conf.d/vv.conf

 <VirtualHost   *:80>

 DocumentRoot   /var/www/virtual

 ServerName   wwwX.example.com

 </VirtualHost> 

 systemctl restart httpd

 在system2上打开firefox查看结果，

15. 配置web内容的访问
在您的system1上的web服务器的DocumentRoot目录下创建一个名为private的目录，要求如下:

A 从http://classroom.example.com/pub/secret.html下载一个文件副本到这个目录，并且重命名为index.html 

B 不要对这个文件的内容做任何修改 

C 在system1上，任何人都可以浏览private的内容，但是从其他系统不能访问这个目录的内容 

 在system1上做，

 mkdir /var/www/html/private

 wget -O /var/www/html/private/index.html http:// classroom.example.com/pub/secret.html

 vim /etc/httpd/conf.d/vv.conf

 <VirtualHost *:80>

 DocumentRoot /var/www/html

 ServerName serverX.example.com

 <directory /var/www/html>

  order deny,allow

  deny from 172.16.0.0/16

  allow from 192.168.0.0/24

 </directory>

 <directory /var/www/html/private>

 order allow,deny  //先允许再拒绝，没有明确允许的都是拒绝

 allow from 192.168.0.150+X

 allow from serverX.example.com

 </directory>

 </VirtualHost>

 <VirtualHost *:80>

 DocumentRoot   /var/www/virtual

 ServerName   wwwX.example.com

 </VirtualHost> 

16. 实现动态WEB内容
在system1上配置提供动态Web内容，要求如下： 

A 动态内容名为dymanicX.example.com的虚拟主机提供 

B 虚拟主机侦听在端口8998 

C 从http://classroom.example.com/pub/webapp.wsgi下载一个脚本，然后放在适当的位置，无论如何都不要求修改此文件的内容 

D 客户端访问http://dymanicX.example.com:8998/时应该接收到动态生成的web页面 

E 此http://dymanicX.example.com:8998/ 必须被example.com域内的所有系统访问 

 在system1上做，

 yum –y install mod_wsgi

 mkdir /var/www/webapp

 cd /var/www/webapp

 wget http://classroom.example.com/pub/webapp.wsgi

 vim / etc/httpd/conf.d/vv.conf //在文件中添加以下内容

 listen 8998

 <VirtualHost  *:8998>

 ServerName dymanicX.example.com

 WSGIScriptAlias   /    /var/www/webapp/webapp.wsgi

 </VirtualHost>

 semanage   port   –a   –t   http_port_t   –p   tcp   8998  //添加端口标签

 systemctl restart httpd

 firewall-cmd --permanent --add-port=8998/tcp

 firewall-cmd --reload

17. 创建一个脚本
在system1上创建一个名为/root/foo.sh 的脚本，让其提供下列特征 

A 当运行/root/foo.sh redhat， 输出为fedora 

B 当运行/root/foo.sh fedora，输出为redhat 

C 当没有任何参数或者参数不是redhat或者fedora时，其错误输出产生以下的信息：/root/foo.sh redhat|fedora 

 在system1上做，

 vim /root/foo.sh

 #!/bin/bash

 case  “$1”  in 

 redhat)

 echo  fedora

 ;;

 fedora)

 echo  redhat

 ;;

 *)

 echo ‘/root/foo.sh redhat|fedora’     1>&2

 ;;

 esac

 chmod a+x /root/foo.sh

18. 创建一个添加用户的脚本
在system1上创建一个脚本，名为/root/batchusers,此脚本能实现为系统system1创建本地用户，并且这些用户的用户名来自一个包含用户名列表的文件。同时满足下列要求：

A 此脚本要求提供一个参数，此参数就是包含用户名列表的文件

B 如果没有提供参数，此脚本应该给出下面的提示信息Usage: /root/batchusers然后退出并返回相应的值

C 如果提供一个不存在的文件名，此脚本应该给出下面的提示信息input file not found 然后退出并返回相应的值

D 创建的用户登录shell为/bin/false 

E 此脚本不需要为用户设置密码

你可以从下面的URL获取用户名列表作为测试用http://classroom.example.com/pub/multiusers.txt

 在system1上做，

 cd  /root

 wget  http://classroom.example.com/pub/multiusers.txt

 vim /root/batchusers

 #!/bin/bash

 if   [  “$#” –eq  0  ];then

 echo ‘Usage: /root/batchusers’

 exit 1

 fi

 if   [  !  –f  “$1”  ];then

 echo ‘Input file not found’

 exit 1

 fi

 for NAME in $(cat “$1”)

 do

 useradd -s /bin/fales $NAME

 done

 :wq

 chmod  a+x  /root/batchusers

19. 配置iSCSI服务端
配置system1提供一个iSCSI 服务磁盘名为iqn.2015-02.com.example:system1并符合下列要求 

A 服务端口为3260 

B 使用iscsi-store作其后端卷其大小为2G 

C 此服务只能被system2访问 

 在system1上做，

 yum –y install targetcli

 systemctl enable target

 systemctl start target

 先分一个2G的空间出来，此处省略了。

 targetcli

 /backstores/block  create  iscsi-store  /dev/vda7  //vda7是我在上面分出来的，实际上根据自己分的盘来设置

 /iscsi create iqn.2015-02.com.example:system1

 /iscsi/iqn.2015-02.com.example:system1/tpg1/acls/  create  iqn.2015-02.com.example:system2 //客户端挂载使用此共享的凭据

 /iscsi/iqn.2015-02.com.example:system1/tpg1/luns  create  /backstores/block/iscsi-store

 /iscsi/iqn.2015-02.com.example:system1/tpg1/portals/  create  192.168.0.150+X

 exit

 systemctl restart target

 firewall-cmd --permanent --add-port=3260/tcp

 firewall-cmd --reload

20. 配置iSCSI的客户端
配置system2是其能连接在system1上提供的iqn.2015-02.com.example:system1并符合以下要求 

A iSCSI 设备在系统启动的期间自动加载 

B 块设备iSCSI上包含一个大小为1G的分区，并格式为ext4 

C 此分区挂载在 /mnt/data上同时在系统启动的期间自动挂载 

 在system2上做， 

 yum –y install iscsi-*

 vim /etc/iscsi/initiatorname.iscsi

 InitiatorName=iqn.2015-02.com.example:system2

 systemctl restart iscsi

 systemctl enable iscsi

 iscsiadm –m discovery –t st –p system1的IP //man iscsiadm 可查到此条命令

 iscsiadm -m node –T  iqn.2015-02.com.example:system1 –l    //man iscsiadm 可查到此条命令

 fdisk /dev/sda

 然后分配一个1G的分区，此处我省略了。

 mkfs.ext4  /dev/sda1

 mkdir /mnt/data

 vim /etc/fstab

 /dev/sda1        /mnt/data      ext4  defaults,_netdev    0   0

 mount -a

21. 配置一个数据库
在system1上创建一个MariaDB数据库，名为employees，并符合以下条件： 

A 数据库应该包含来自数据库复制的内容，复制文件的URL为http://classroom.example.com/pub/employees.dump

B 数据库只能被localhost访问 

C 创建bob用户，此用户的密码为redhat

D 除了root用户，此数据库只能被用户bob查询

E root用户的密码为redhat,同时不允许空密码登录 

 在system1上做， 

 yum groupinstall -y  mariadb  mariadb-client

 systemctl enable mariadb

 systemctl start mariadb

 mysql_secure_installation //使用向导来设置root密码,其余选项，默认全是Y。

 mysql  -u root -p

 create user bob@localhost identified by ‘redhat’;

 show databases;

 create database employees;

 grant  select  on  employees.*  to  bob@localhost  identified  by   ‘redhat’;

 exit

 wget  http://classroom.example.com/pub/employees.dump

 mysql -u root -p employees < employees.dump

 mysql -u root -p 

 use employees;

 exit

22. 数据库查询
在系统system1上使用数据库employees，并使用相应的SQL查询以回答下列问题： 

1. 从 employees 表中查询last_name 是＇Zucker＇，first_name 是＇Oguz＇的用户emp_no

2. 查询 emp_no 是477008 用户的部门名称

 mysql -u root -p

 use employees;

 

 show  tables;

 desc 表名称；

 select dept_no from dept_emp where emp_no = 477008;

 select * from departments where dept_no = 'd003';
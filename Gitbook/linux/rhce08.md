修改hostname

vim /etc/hostname 重启

client.example.com

if =&gt;interface

---

考试 推荐用配置文件

查看gateway   $ip route show

dhcp Dynamic Host Configuration Protocol 动态的调整主机的网络参数 GATEWAY 不要设置

ip 地址解释 鸟哥 [http://cn.linux.vbird.org/linux\_server/0110network\_basic\_3.php](http://cn.linux.vbird.org/linux_server/0110network_basic_3.php)

联网 配置 [http://cn.linux.vbird.org/linux\_server/0130internet\_connect\_1.php](http://cn.linux.vbird.org/linux_server/0130internet_connect_1.php)

[http://cn.linux.vbird.org/linux\_server/0130internet\_connect\_2.php](http://cn.linux.vbird.org/linux_server/0130internet_connect_2.php)

鸟哥   [http://cn.linux.vbird.org/linux\_server/0230router.php\#sysctl](http://cn.linux.vbird.org/linux_server/0230router.php#sysctl)

vim /etc/sysconfig/network-scripts/ifcfg.eno1111

\#ubuntu  vim /etc/network/interfaces

HWADDR 硬件地址

TYPE=Ethernet  以太网

BOOTPROTO 启动协议  none无需要协议  不需要动态分配   dhcp动态加载  没有dhcp服务 不能分配 地址分配功能

uuid 设备唯一编号

ONBOOT 是否设置开机加载 启动时 是否把配置文件加载到对应网卡   yes

IPADDR=172.25.1.101  指定IP时需要添加

NETMASK=255.255.255.0 掩码 。\#PERFIX=24 效果一样

GATEWAY=172.25.1.254 网关   &lt;==最重要的设定啊！透过这部主机连出去的！\(鸟哥\)每个环境都不同，请自行询问网络管理员

DNS1=172.25.1.254  有俩个dns 和WINDDOWS 一样

DNS2=

systemctl restart network

---

nmcli 命令 只能rhce 配置网络

nmcli connection show 查看网络 设备

nmcli connection modif eno111 ipv4.address '172.25.1.102/24 172.25.1.254'

nmcli connection modif eno111 ipv4.method manual  \#手动模式 启动模式设置为nono

ONBOOT 是否设置开机加载 启动时 是否把配置文件加载到对应网卡   yes

vim /etc/resolv.conf 查看DNS  修改DNS

nameserver 8.8.8.8

```
看看 DNS 是否顺利运作了
dig www.google.com
```

|  |
| :--- |


---

ip addr

ifconfig

nmcli connection show 查看网络 设备  别的模式则呢么查看

指定 了 ip  别的电脑自动分配 发什么

---

桥接  让虚拟机 能通过和物理机 一样的ip

nat 内网地址转换为外网地址

仅主机  和物理机联通 但和外面的网络不联通

---

DNS

ip 地址 和 mac地址 可以相互转换

内网时 有ip和mac地址  内网 用mac地址 传输数据   往外传数据用ip地址

FQDN 完全合格域名

.根域

顶级域名

二级域名 baidu

其他子域

dns 先查本地dns 在去从.根域 开始查 在查.com的dns服务器

递归 自己查自己

迭代 dns和dns之间的交流

bind dns服务器

chroot =&gt; changeroot

---

搭建 dns 服务器

Domain Name System 域名系统

internet protocol

[https://mp.weixin.qq.com/s/uFFKfpwMm-gs62k3OIq2PA](https://mp.weixin.qq.com/s/uFFKfpwMm-gs62k3OIq2PA)

[http://evolution.blog.51cto.com/3343305/643520/](http://evolution.blog.51cto.com/3343305/643520/)

鸟哥  [http://cn.linux.vbird.org/linux\_server/0350dns.php](http://cn.linux.vbird.org/linux_server/0350dns.php)

yum install bind bind-utils

守护 进程/usr/sbin/named

端口 53

systemctl stop firewalld  \#关闭防火墙  守护进程 一般有d

setenforce 0 \# 关闭 SElinux

cname 别名记录       如果你有一个 IP，这个 IP 是给很多主机名使用的。 那么当你的 IP 更改时，所有的数据就得通通更新 A 标志才行。如果你只有一个主要主机名设定 A，而其他的标志使用 CNAME 时，那么当 IP 更改，那你只要修订一个 A 的标志，其他的 CNAME 就跟着变动了！处理起来比较容易啊！

vim /etc/name.conf  \#主配置文件

```
[root@www ~]# cp /etc/named.conf /etc/named.conf.raw
[root@www ~]# vim /etc/named.conf
// 在预设的情况下，这个档案会去读取 /etc/named.rfc1912.zones 这个领域定义档
// 所以请记得要修改成底下的样式啊！
options {
        listen-on port 53  { any; };     //可不设定，代表全部接受
        directory          "/var/named"; //数据库默认放置的目录所在
        dump-file          "/var/named/data/cache_dump.db"; //一些统计信息
        statistics-file    "/var/named/data/named_stats.txt";
        memstatistics-file "/var/named/data/named_mem_stats.txt";
        allow-query        { any; };     //可不设定，代表全部接受
        recursion yes;                   //将自己视为客户端的一种查询模式
        forward only;                    //可暂时不设定  连不上 可能时间不正确 需要同步时间
        forwarders {                     //是重点！
                8.8.8.8;              //谷歌DNS当上层
        };
};  //最终
```

forward only      DNS 服务器仅进行 forward，即使有 . 这个 zone file 的设定，也不会使用 . 的资料， 只会将查询权交给上层 DNS 服务器而已，是 cache only DNS 最常见的设定了！

改liston on any

listen-on port 53  { any; };     //可不设定，代表全部接受

```
allow-query        { any; };     //可不设定，代表全部接受
```

/etc/named.rfc1912.zones 。新区域配置文件 新写条目

zone "example.com"IN{

type master;

file "example.zone" \#正向解析 域名=&gt;ip

allow-update {none;};

};

zone "1.25.172.in-addr.arpa"IN{\#反写网段 不用写主机号

type master;

file "172.zone";

allow-update {none;};

}

-p 把权限保留下来

cp -p /var/named/named.localhost  /var/named/example.zone

cp -p /var/named/named.loopback  /var/named/172.zone

@这个符号代表 zone 的意思！例如写在 named.example.com 中，@ 代表 example.com.，如果写在 named.192.168.100 档案中，则 @ 代表 100.168.192.in-addr.arpa. 的意思 \(参考 named.conf 内的 zone 设定\)

SOA：就是开始验证 \(Start of Authority\) 的缩写，相关资料本章后续小节说明；

NS：就是名称服务器 \(NameServer\) 的缩写，后面记录的数据是 DNS 服务器的意思；

A：就是地址 \(Address\) 的缩写，后面记录的是 IP 的对应 \(最重要\)；

```
$TTL 1D
@       IN SOA  @ sunkejl.sina.com. (
                                        0       ; serial
                                        1D      ; refresh
                                        1H      ; retry
                                        1W      ; expire
                                        3H )    ; minimum
        NS      @
        A       172.16.54.90
adminlocal IN  A    172.16.54.90
```

编辑上面的俩个文件,所有域名地址都要加点\#todo

rh1912

cp -p 改写俩个地方

---

mount

[https://access.redhat.com/documentation/en-US/Red\_Hat\_Enterprise\_Linux/3/html/Introduction\_to\_System\_Administration/s1-storage-rhlspec.html](https://access.redhat.com/documentation/en-US/Red_Hat_Enterprise_Linux/3/html/Introduction_to_System_Administration/s1-storage-rhlspec.html)

---

双网卡 绑定

俩张物 理网卡 绑在一起 一个ip地址 。冗余 。 当一个 网卡损坏  主被热切换 。

参考 word


应用层 (Application)：应用层是个很广泛的概念，有一些基本相同的系统级 TCP/IP 应用以及应用协议，也有许多的企业商业应用和互联网应用。

传输层 (Transport)：传输层包括 UDP 和 TCP，UDP 几乎不对报文进行检查，而 TCP 提供传输保证。

网络层 (Network)：网络层协议由一系列协议组成，包括 ICMP、IGMP、RIP、OSPF、IP(v4,v6) 等。

链路层 (Link)：又称为物理数据网络接口层，负责报文传输。



socket()：是用来创建一个 socket，socket 表示通信中的一个节点，其可以在一个网络中被命名，用 socket 描述符表示，socket 描述符类似于 Unix 中的文件描述符。

bind()：是用来把本地 IP 层地址和 TCP 层端口赋予 socket。

listen() ：把未连接的 socket 转化成一个等待可连接的 socket，允许该 socket 可以被请求连接，并指定该 socket 允许的最大连接数。

accept()：是等待一个连接的进入，连接成功后，产生一个新的 socket 描述符，这个新的描述符用来建立与客户端的连接。

connect()：用来建立一个与服务端的连接。

send()：发送一个数据缓冲区，类似 Unix 的文件函数 write()。另外 sendto() 是用在无连接的 UDP 程序中，用来发送自带寻址信息的数据包。

recv()：接收一个数据缓冲区，类似 Unix 的文件函数 readI()。另外 recvfrom() 是用在无连接的 UDP 程序中，用来接收自带寻址信息的数据包。

close()：关闭一个连接
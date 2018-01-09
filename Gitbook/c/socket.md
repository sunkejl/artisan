int socket(int domain,int type,int protocol);
成功返回文件描述符，失败返回-1
domain socket中使用的协议族protocol family信息
type socket传输类型信息
protocol 通信协议信息

protocol family
PF_INET IPv4协议族
PE_INET6 IPv6协议族
PE_LOCAL 本地unix协议族
PE_PACKET 底层socket协议族
PE_IPX  IPX协议族


type
SOCK_STREAM  
面向连接的socket
数据不消失
按顺序传输
数据不存在边界
IPPROTO_TCP

SOCK_DGRAM
面向消息的socket
快速 
可能丢失
有数据边界
限制每次传输的大小
IPPROTO_UDP

IPv4
Internet protocol version 4 4字节地址族
Internet protocol version 6 16字节地址族
网络id 主机id


端口16位 0-65535
0-1023 well know port

int bind(int sockfd,struct sockaddr * myaddr,socklen_t addrlen);
sockfd socket文件描述符
myaddr 结构体变量地址值
addrlen 第二个结构体变量长度

tcp transmission control protocol
stream 流


应用层
tcp udp 层
ip 层
链路层

tcp 服务器端 默认函数调用顺序
socket()创建套接字
bind()分配套接字地址
listen()等待连接请求状态
accept()允许连接
read()/write()数据交换
close()断开连接

int listen(int sock, int backlog);
sock 希望进去等待连接状态的socket文件描述符
backlog 连接请求等待队列queue的长度 比如5 队列长度为5 最多5个连接请求进入队列

int accept(int sock,struct sockaddr * addr,socklen_t * addrlen);
sock sock文件描述符
addr 客户端地址信息的表变量的地址
addrlen addr结构体的长度












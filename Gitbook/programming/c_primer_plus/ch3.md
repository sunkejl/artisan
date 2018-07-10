常量constant
变量variable

数据类型
int 
long 
short
void
float
double
unsigned
signed


最小的存储单元 位 bit 0 1

字节 byte 1byte 8 bit 
8个比特
1个字节 可以表示256个可能 2的8次方
0-255的整数

字word 
8位的计算机 一个字长只有8位
16位 32位 64位 计算机
计算机字长越大 数据转移越快 允许的内存访问更多

浮点存储
浮点数分成小数部分和指数部分分开表示，分开存储

符号+小数部分+指数部分

int 
16位int -32768-32767
32位int
64位int

初始化initialize

声明变量 创建和标记存储空间，指定初始值

十六进制的每个位的数可以用4位的二进制数来表示
0x10      16
0001 0000

0xf      15
1111

Ox5     5
0101

Ox55     85
0101 0101

使用不同的进制是为了方便

十进制%d
八进制%o
十六进制%x

显示前缀0,0x,0X
%#0,%#x,%#X


short 比int 小
long 比int 大


常见的int 16位或者32位
short 16位
影响取值的大小

char 存储字符 字母 或者标点
技术层面 char是整数类型
实际存储的是整数而不是字符
65 A
ASCII 0-127
通常char定义为8位的存储单元

上溢 overflow 数字过大

下溢出 underflow 丢失小数点后面的数值 

printf("%d",sizeof(char));
1

char 1个字节 255  1byte

printf 把输出发送到缓冲区buffer的中间存储区域
缓冲区满了或者需要输入的时候把数据发送到屏幕



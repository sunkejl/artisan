%p 打印指针地址

%d decimal  34

%c 单个字符character "a"

%s 字符串character "abc"

%f  floating 3.14

printf   f=&gt;format

\n new line

\n escape squence 转义字符

constant 常量

varibale 变量

initialize 初始化

scanf 变量前必须加&

puts s代表string 输出字符串 实参只能有一个

结构体
struct c{double x,y;} z;#定义结构体

```
#include <stdio.h>

int main(){
    struct c{
        double x,y;
    } z;
    z.x=1.1;
    z.y=1.2;
    struct c e;
    e.x=1.3;
    e.y=1.4;
    printf("%f\n%f\n%f\n%f\n",z.y,z.x,e.x,e.y);
    return 0;
}
```

数组（Array）也是一种复合数据类型，它由一系列相同类型的元素（Element）组成.

通过循环把数组中的每个元素依次访问一遍，在计算机术语中称为遍历（Traversal）.

数组名做右值使用时，自动转换成指向数组首元素的指针。数组类型不能互相赋值

gcc -E struct.c
显示编译前的过程

字符串
 char str[]="abc";
 char *str1="efg"
 
 scanf("%d",&abc);
 scanf("%s",abc);#字符串不需要&


gdb 单步调试http://docs.linuxtone.org/ebooks/C&CPP/c/ch10s01.html

算法（Algorithm）

数据结构（Data Structure）


队列也是一组元素的集合，也提供两种基本操作：Enqueue（入队）将元素添加到队尾，Dequeue（出队）从队头取出元素并返回。就像排队买票一样，先来先服务，先入队的人也是先出队的，这种方式称为FIFO（First In First Out，先进先出），有时候队列本身也被称为FIFO。


堆栈是一组元素的集合，类似于数组，不同之处在于，数组可以按下标随机访问，这次访问a[5]下次可以访问a[1]，但是堆栈的访问规则被限制为Push和Pop两种操作，Push（入栈或压栈）向栈顶添加元素，Pop（出栈或弹出）则取出当前栈顶的元素，也就是说，只能访问栈顶元素而不能访问栈中其它元素。


十进制（Decimal）
二进制（Binary）

计算机存储的最小单位是字节（Byte），一个字节通常是8个bit。C语言规定char型占一个字节的存储空间.8个bit就是255


：CPU（CPU，Central Processing Unit，中央处理器，或简称处理器Processor）

内存（Memory）


位运算
http://docs.linuxtone.org/ebooks/C&CPP/c/ch16s01.html


32位的x86平台为例，所谓32位就是指地址是32位的，从0x0000 0000到0xffff ffff。
32个1 对应十进制4294967295
4×1024×1024×1024Byte=4294967296
4G的内存






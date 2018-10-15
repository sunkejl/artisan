输入 输出 函数 I/O

input output

单字符 getchar() putchar()

缓冲区 buffer
无缓冲区 输入直接输出出来
有缓冲区 用户可以修改输入的内容

c语言处理的是流stream而不是文件 stream是实际输入输入出映射的理想化数据流
不同属性种类的输入变成统一的流来表示，读写都用流来处理

stdin 表示键盘输入
stdout 表示屏幕输出

EOF 键盘输入
UNIX ctrl+D 
DOS  CTRL+Z

输入重定向
./getchar.o < a.txt

输出重定向

>>
输出加在文件的末尾 

从文件读取内容
```
#include <stdio.h>
void main(){
    char c;
    FILE *fp;
    fp=fopen("a.txt","r");
    while((c=getc(fp))!=EOF){
        putchar(c);
    }
    fclose(fp);
}
```

假设程序要求用getchar()处理字符输入，用scanf()处理数值输入，这两个函数都能很好地完成任务
但是不能把它们混用。因为getchar()读取每个字符，包括空格、制表符和换行符
而scanf()在读取数字时则会跳过空格、制表符和换行符



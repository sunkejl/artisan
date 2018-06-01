int open(const char *path,int flag);
O_CREAT  创建文件
O_TRUNC  删除全部数据
O_APPEND 保存到后面
O_RDONLY 只读打开
O_WRONLY 只写打开
O_RDWR 读写打开
flag 如需多个参数 可通过位操作符来传递

int close(int fd);
使用文件后必须关闭

```c
#include <stdio.h>
#include <stdlib.h>
#include <fcntl.h>
#include <unistd.h>
int main(void){
        int fd;
        int wd;
        fd=open("2.md",O_CREAT|O_APPEND|O_WRONLY);
        char buf[]="hao 123";
        wd=write(fd,buf,sizeof(buf));
        printf("%d",wd);
        close(fd);
        return 0;
}

```
读取
```
rd=read(fd,buf,sizeof(buf));

```

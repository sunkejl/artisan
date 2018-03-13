 declare a pointer variable
```
int *ip;
```
ip 不是int ip指向的数据是int


```
int i = 5;
	ip = &i;
```
&i generates a pointer to i
生成指针指向i

```
printf("%d\n", *ip);
```
*ip   the variable pointed to by ip  
ip指向的值

```
printf("%p",ip);
```
ip  输出地址

数组的指针
指针不仅可以指向单独变量 也能指向数组中的一个值

指针的算术
加和减 引用下一个数组单元
```
#include <stdio.h>
int main(){
    int i[4]={1,2,3,4};
    int *ip;
    ip = &i[0];
    *ip =5;
    *(ip+1)=6;
    printf("%d\n",i[0]);
    printf("%d\n",i[1]);
    printf("%d\n",i[2]);
    printf("%d\n",i[3]);
}
```
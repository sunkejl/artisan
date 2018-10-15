#include <stdio.h>
void main (){
        int a =1;
        int *p;//声明指针变量
        p = &a;//变量a的地址赋值给指针变量
        printf("%p",p);//输出十六进制的地址
        printf("%d",*p);//使用指针访问值
}

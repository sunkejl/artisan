```php
  1 #include <stdio.h>
  2 void main(){
  3     int arr[10]={1,2,3};
  4     int *p;
  5     p=arr;
  6     printf("%d",*p);
  7     printf("\n");
  8     int *p1;
  9     p1=&(arr[0]);
 10     printf("%d",*p1);
 11     }
```
p=arr 和p=&(arr[0]);等价

指针变量是变量
p=arr;
p++;
都是合法的
但arr不是变量
arr=p;
arr++;
是非法的

arr+2 合法 是往后移动俩个位置的地址

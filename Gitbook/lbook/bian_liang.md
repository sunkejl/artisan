# 变量

```#! /bin/bash```

chmod u+x test  赋可执行权限 见第7章

echo "this is a test"

echo -n 输出字符串和命令输出在同一行

set 显示当前环境变量的列表

echo $UID 加$输出环境变量

定义用户变量 days=10  echo "$days"  赋值时不用加$

命令替换 俩种形式 (`date`) | $(date)
today=$(date +%y%m%d)
ls / >log.$today

重定向
`>`新建或者覆盖保存
`>>`追加保存

wc 获取文本的行数 词数 字节数

wc < test.txt 输入重定向 来获取信息

<<内联输入重定向 
wc << EOF  EOF为必须指定的文本标记 可以为任意字符串

管道  command1 |command2
linux 同时运行俩个命令 系统内部将他们连接起来 第一个命令产生输出的同时 立即送给第二个命令
ll | more 列表长的时候 强制输出一屏

退出状态码 0-255之间 超出对256取余 显示余数 
echo $? 查看推出状态码
成功的状态码为0  错误 状态码就是一个正整数

自定义退出状态码
exit 5
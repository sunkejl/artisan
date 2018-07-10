shell 编程

机器语言 01

静态语言  编译型语言  c c++ java 。变量强类型 必须声明变量类型 。需要编译器 整体分装成二进制运行

动态语言  解释性语言  python php asp.net shell  需要解释器  一行一行解释成底层代码 。变量弱类型

面向对象 抽象 封装

shell  命令解释器

默认用bash  bash 是语言

bash 放在 /bin/bash

alias 查看别名

alias editfile='vim'

unalias editfile 取消别名

---

本地变量

变量名大写

NAME=sk

echo $NAME 仅在当前shell中生效  本地变量

bash 再开一个bash

echo $NAME 无

exit

环境变量

作用于当前shell和子进程

export CLASS=sk

echo $CLASS

再开一个shell进程

bash

echo $CLASS

unset NAME \#删除变量

预定义变量

$$ 当前shell的pid

echo $$

$? 前一个执行的返回值

echo $?

程序状态返回代码0-255

0正确执行

1-255 错误执行 1，2，127 系统预留 其他都可以自己定义

位置变量 用来传参

ls -l  -l第一个位置参数

ls -a -l

从键盘输入内容 给变量赋值

read \[-p \] 变量名

echo "his name is ${NAME}123" 紧密连接的变量输出  双引号  可输出变量

echo '$name' 单引号 强引用   直接输出

反引号 命令结果输出给变量  echo "now is \`date\`"

查看环境变量 export  关机不会消失 系统变量 自定义的关机后消失

$PATH shell使用脚本的位置

vim myscript.sh

\#!/bin/bash   \#预制语言 。写了 不用加/bin/bash 去执行

./myscriot.sh

把目录加到PATH目录  加入系统变量  命令去PATH下搜索

PATH="$PATH: /myscript

alias pi=''myscript.sh“

du -sh 输出目录的使用情况

chmod -a+x 加执行权限

条件表达式  \[   \] 括号和语句要有空格

test -e /etc/passwd  测试文件是否存在-e

echo $?

\[ -e /etc/passwd \]&& echo "yes"

-eq equal

-ne not equal

-gt

-le less equal

...

整数比较

\[ \`who\|wc -l\` -le 10\] && echo "yes"

if 语句 单分支

if \[ \]

then

fi

双分枝

if\[ $? -eq 0 \]

then

echo "runging"

else

/etc/init.d/mysqld restart

多分枝

if

then

elif

then

elif

else

fi

for 循环

for 变量名 in 列表

do

动作

done

while

do

操作

done

\#!/bin/bash

i=1

while \[$i -le 20\]

do

useradd stu$i

echo "123456" \| passwd --stdin stu$i &&gt; /dev/null\(黑洞\)

i="expr $i" +1

done

case 变量名 in

\*\)

默认命令

esac 反写case 结束

case  $i in

start\)

echo ""

;;

stop\)

echo ""

;;

\*\)

echo ""

;;

esac

until   条件为真 。才结束循环

do

done

mariaDB 就是mysql

yum -y groupinstall mariadb mariadb-client

339  systemctl start mariadb

340  systemctl enable mariadb

mysql secure\_installation 安全安装引导

mysql -u root -p

show databases;

desc hosts; 列出表属性

grant  select,insert,delete,update on databases.table to root@localhost   加权限

revoke 。撤销权限

flush privileges;刷新

---

selinux   美国安全局开发    一般 关掉 。考试要打开

保护端口 保护文件 。不开源

vim  /etc/selinux/config

enforcing

permissive

disabled 不加载

---

防火墙

大公司有硬件 防火墙  不需要开软件防火墙

systemctl start firewalld

firewall config & 开启可视化防火墙






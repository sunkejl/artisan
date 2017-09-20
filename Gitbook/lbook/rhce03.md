vim

四种模式

一般模式

插入模式

命令模式  保存退出

可视模式  复制粘贴 visual模式

v V选中当前行

2j 下移动2行

shift g 和G 一样

3gg 第三行

gg 首行

i  光标前插入 a 光标后插入

I 行头 A 行尾 插入 。shift i a效果一样

o下一行插入 O上一行插入

:set autoindent

When 'autoindent' is on, the indent for a new line is obtained from the

previous line.

s 替换 进入插入模式

shift s 替换当前行 进入插入模式

:w \#write :w /file1 另存为

:set number

:%s 所有行

:%s/root/test /g

:1,10s/root/test/g  s代表行  g代表所有 i ignore case for the pattern

help :s   查看:s 帮助

p 小写 下面粘贴 大写 上面粘贴   对字符 小写放后面 大写 放前面

行 cc替换 dd剪切 yy拷贝  2dd 剪切俩行

字符 cl 5cl 去掉5个字符

单词 cw   dw  yw  从光标开始算单词  caw daw yaw

u 重做

ctrl + r 恢复

---

cut 提取文件的列 或者标准输出数据

把文件一部分内容切出来

cut -d ':' -f1 testfile   -f1第一列 -f2 第二列

cut -c2-5 testfile  第二个到第五个

---

I/O 重定向 。不通过键盘 屏幕

标准输入 STDIN  键盘 0

标准输出 终端窗口 1

标准错误 终端窗口 2

&gt;重定向标准输出到文件

2&gt;重定向错误

&&gt;所有输出到文件

&gt;&gt;  追加文件

2&gt;&1  全部重定向到file  和第三个意思一样 。编程语言一定要用这个 （可以这个理解 2&1&gt;）

nohup php foo.php &gt; nohup.out 2&gt;&1 &

tr 'a-z' 'A-Z' &lt;.test.md 把小写变大写  文件内容输入到tr命令中  等效于  cat  test.md \| tr 'a-z' 'A-Z'

---

管道

第一个命令的输出 不输出到屏幕 作为第二个命令的输入

ls -l /etc \| less   \#less的数据从前一个过来  达到分页显示的目的

echo "test" \| mail -s "test " client@local.com

tee 命令

ls -l /etc \| tee filename \| less  第一个输出 先存起来 然后作为第三个命令的输入

---

find / -name eno\*   \*匹配任意多字符         \*eno\*

grep  -i 忽略大小写  -n 打印匹配的行号  -v 打印出不匹配的行  -r 递归搜索  -c  打印符合的数量

grep "client" /etc/passwd

sort  对标准输出排序 原文件不改变  默认从a-z

-r 反向排序

-n 数字排序

-f 忽略大小写

uniq 临近行重复删除 -c 记录重复次数

cut -d: f7 testfile \| sort \| uniq -c

diff 判断俩文件的区别

diff file1 file2

sed 查询 替换 删除 追加指令  仅仅显示在屏幕上 需要重定向到文件

gerp "^root" filename

grep "root$" filename  行末尾是root

---

ctrl+z

jobs 查看

fg 1 调出

bg1 后台执行


https://linux.cn/misc.php?mod=tag&id=5363&type=article
 
1
 
文本流
I/O input/output 
#command > file  重定向操作符
#command1 | command2 管道操作符
 
sed 用于替换 是流编辑器stream editor的缩写。流编辑器是用来在一个输入流（文件或者管道中的输入）执行基本的文本转换的工具。
sed 's/and/\&/g;s/^I/You/g' ahappychild.txt
 
uniq 命令允许我们返回或者删除文件中重复的行
 
# cat /var/log/mail.log | uniq -c -w 6           uniq 比较每一行的前6个字符（-w 6）（这里是指定的日期）来统计日志事件的个数，而且在每一行的开头输出出现的次数（-c）。
 
grep 在文件（或命令输出）中搜索指定正则表达式，并且在标准输出中输出匹配的行。
 
grep -i gacanepa /etc/passwd
 
 
tar zcvf 压缩 tar zxvf 解压缩  tar zcvf index.gz index.php 
 
find . -maxdepth 3 -type f -size +2M
 
chmod [new_mode] file
 
chown user:group file  通过 chown 命令可以对文件的归属权进行更改，可以同时或者分开更改属主和属组。
 
echo $PATH
环境变量
这是当输入命令时系统所搜索可执行程序的目录，每一项之间使用冒号 (:) 隔开。称它为环境变量，
是因为它本是就是 shell 环境的一部分 —— 这是当 shell 每次启动时 shell 及其子进程可以获取的一系列信息。
 
如果我们自己编写的脚本没有放在 $PATH 变量列出目录中的任何一个，则需要输入 ./filename 来执行它。
而如果存储在 $PATH 变量中的任意一个目录，我们就可以像运行其他命令一样来运行之前编写的脚本了。
 
shell 脚本的第一行 (著名的释伴行shebang line) 必须如下：
#!/bin/bash
 
  1 #!/bin/bash
  2 echo aaaa
  3 while read host;do
  4     echo $host
  5 done <myhosts
 
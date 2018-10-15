 
https://linux.cn/article-6133-1.html
 
type 命令可以帮助我们识别某一个特定的命令是由 shell 内置的还是由一个单独的包提供的
cd 和 type 是 shell 内置的命令，top 和 less 是由 shell 之外的其他的二进制文件提供的
 
history 命令 按下 Ctrl + r 并输入与命令相关的第一个字符。我们可以看到的命令会自动补全
 
alias ls='ls --color=auto'  别名
 
man | info  查看帮助
 
# head -n3 /etc/passwd
# tail -n3 /etc/passwd  tail -f 实时显示
 
split 命令常常用于把一个文件切割成两个或多个由我们自定义的前缀命名的文件。
split -b 50KB -d bash.pdf bash_
合并
cat bash_00 bash_01 bash_02 bash_03 bash_04 bash_05 > bash.pdf
 
tr 命令多用于一对一的替换（改变）字符，或者使用字符范围。
小写字母 o 变成大写 cat file2 | tr o O
所有的小写字母都变成大写字母 cat file2 | tr [a-z] [A-Z]
 
sed 's/and/\&/g;s/^I/You/g' ahappychild.txt #sed 也是替换
 
uniq 命令可以帮我们查出或删除文件中的重复的行，默认会输出到标准输出，我们应当注意，uniq只能查出相邻的相同行，所以，uniq 往往和 sort 一起使用(sort 一般用于对文本文件的内容进行排序)
默认情况下，sort 以第一个字段(使用空格分隔)为关键字段。想要指定不同关键字段，我们需要使用 -k 参数，请注意如何使用 sort 和 uniq 输出我们想要的字段，具体可以看下面的例子：
# cat file3
# sort file3 | uniq
# sort -k2 file3 | uniq
# sort -k3 file3 | uniq
 
fmt 被用于去“清理”有大量内容或行的文件，或者有多级缩进的文件。
 
pr 分页并且在按列或多列的方式显示一个或多个文件。
ls -a  | pr -n --columns=3 -h "name"
 
file [filename]来判断一个文件的类型 
 
touch 命令 不仅仅能用来创建空文件，还能用来更新已有文件的访问时间和修改时间。
 
>       重定向标准输出到一个文件。如果目标文件存在，内容就会被重写。
>>      添加标准输出到文件尾部。
 
# ln TARGET LINK_NAME               #从LINK_NAME到Target的硬链接
# ln -s TARGET LINK_NAME            #从LINK_NAME到Target的软链接
 
管理用户帐户
adduser [new_account]
useradd [new_account]
 
添加过帐户后，任何时候你都可以通过 usermod 命令来修改用户账户信息，基本的语法如下:
 
# usermod [options] [username]
 
usermod --expiredate=2016-10-10 wwww
 
# chage -l [username]   查看修改后用户过期时间
 
想要关闭帐户，你可以使用 -l(小写的L)或 -lock 选项来锁定用户的密码。这将会阻止用户登录。
 
 usermod --unlock www     解锁
 
# groupdel [group_name]        # 删除组
# userdel -r [user_name]       # 删除用户，并删除主目录和邮件池
 
chmod [new_mode] file
R = 2^2，W = 2^1，x = 2^0
 
改变文件的所有者，您应该使用chown命令。请注意，您可以在同时或分别更改文件的所有组：
 
# chown user:group file
 
# chown :group file              # 仅改变所有组
# chown user: file               # 仅改变所有者
 
VIM
保存   wq!   x!      ZZ
 
剪切 N 行：在命令模式中键入 Ndd。
 
复制 M 行：在命令模式中键入 Myy。
 
粘贴 p
 
 
:r filename  要插入另一个文件的内容到当前文件
:r! command  插入一个命令的输出到当前文档
 
对于你来说，要能够使用 SSH 远程登录到一个 RHEL 7 机子，你必须安装 openssh，openssh-clients 和 openssh-servers 软件包。下面的命令不仅将安装远程登录程序，也会安装安全的文件传输工具以及远程文件复制程序：
 
# yum update && yum install openssh openssh-clients openssh-servers
 
配置文件 /etc/ssh/sshd_config
让我们假设你选择了端口 2500 。使用 netstat 来检查所选的端口是否被占用：
 
# netstat -npltu | grep 2500
假如 netstat 没有返回任何信息，则你可以安全地为 sshd 使用端口 2500
 
如果可以 基于公钥登录 而不是使用密码
 
 
SSH无密码登录
#
ssh-keygen
cd .sh
ssh-copy-id root@192.168.8.178
#
 
hostA上使用ssh-keygen生成一对rsa公私钥，生成的密钥对会存放在~/.ssh目录下。
 
ssh-keygen -t rsa
 
hostB上的www用户目录下创建~/.ssh目录
ssh www@hostB mkdir -p .ssh
 
将hostA上用户“aliceA”的公钥拷贝到aliceB@hostB上，来实现无密码ssh。
cat .ssh/id_rsa.pub | ssh aliceB@hostB 'cat >> .ssh/authorized_keys'
 
上述的创建目录并复制的操作也可以通过一个 ssh-copy-id 命令一步完成：ssh-copy-id -i ~/.ssh/id_rsa.pub aliceB@hostB
 
 
 
 
 
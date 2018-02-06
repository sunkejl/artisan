# 命令行


**内核**（Kernel）主要负责四种功能              
1.系统内存管理          
内核通过硬盘的存储空间来实现虚拟内存，称之为交换空间 不断在交换空间和物理内存中交换内容。          
2.软件程序管理          
运行中的程序叫做进程               
/etc/init.d 开机启动的应用脚本在这个目录         
3.硬件设备管理             
系统将硬件设备当成特殊的文件成为设备文件              
4.文件系统管理                 

shell    
交互式工具，核心是命令提示符 默认的shell都是bash shell       

cli              
command line interface 

 /etc/passwd 包含所有系统用户帐户列表和每个用户的基本信息 最后一个字段为默认的shell程序 会自动启动
 
 man vim 查看手册 q退出
 
 uname -a 输出所有内核 系统 信息          
 
 info vim 
 
 vim --help
 
 tail -n 10 -f access.log  尾端显示10行 新数据加入时同步显示
 
 ./ 当前目录
 ../ 当前目录的父目录
 
 ls -F 区分文件和目录
 ls -a 显示隐藏文件
 ls -R 递归显示所有子文件夹
 ls -l 显示长列表 大小以字节为单位
 ls -i 查看inode编号
 
 touch 创建和改变文件修改时间
 
 cp soure destination
 cp -R scripts/ newScripts 把scripts下有所复制到newScripts里
 
 tab 制表键 自动补全
 
 符号链接                
 软链接（又称符号链接，即 soft link 或 symbolic link）      
ln -s oldfile newfile 
 俩个文件内容并不相同 仅仅是指向而已
 文件用户数据块中存放的内容是另一文件的路径名的指向，则该文件就是软连接        
 有指向符号
 ln -s /usr/local/webserver/php5.2.17/sbin/php-fpm /etc/init.d/php-fpm
 ln -s /usr/local/webserver/nginx/sbin/nginx /etc/init.d/nginx

ls -i 查看 inode 号          

 
 硬连接
 一个 inode 号对应多个文件名，则称这些文件为硬链接。换言之，硬链接就是同一个文件使用了多个别名                
 ln oldfile newfile            
 创建虚拟文件根本上是同一个文件
 无指向符号
 
 -i参数  覆盖已有内容是会提示
 cp -i
 mv -i
 
 
 rm -i 提示是否要删除removing
 
 mkdir -p new_dir/sub_dir  同时创建多个目录和子目录
 
 file my_file 查看文件类型
 
 cat -n 加行号
 
 more 支持分页 空格翻页
 
 less  是more的升级版
 
 tail -n 2 log_file
 
 head  -n 2 log_file
 
 ps 默认值显示属于当前用户的进程  -f 显示父进程和子进程 ppid 父进程
 
 df 查看设备上还有多少磁盘空间 -h易读方式显示
 
 du 显示特定目录下的磁盘使用空间 -h易读方式显示 -c显示总和
 
 1k=1024字节
 
 grep myname file1 在file1里找myname
 
 grep -n myname file1 在file1里找myname -n 显示行号  -v 反向搜索 -n 显示行号 
 如果指定多个模式 用-e参数 
 grep -e myname -e othername file1
 
 tar -zxvf filename.tar.gz  -x extract  -c create   
 
 bash 或者bin/bash 创建新的shell程序 子shell
 通过ps -f可以看到pid 和ppid 便是父与子的关系
 如果使用 ps而不带选项，那么您会看到一组使用您的终端作为其控制终端的进程
 
 依次运行命令
 pwd;ls;pwd;
 
 进程列表
 (pwd;ls;pwd;)
 查看是否存在子shell echo $BASH_SUBSHELL
 
 (pwd;ls;pwd;echo $BASH_SUBSHELL)
 
 命令加& 后台运行
 sleep 3000& 在后台执行
ps -f 查看这个后台sleep
jobs 也可以查看 jobs -l 展示更多信息
 
 jobs 显示后台进程
  fg %1来重新启动 
 
 外部命令 
 文件系统命令 存在于bash shell之外的程序
 位于/bin,/usr/bin,/sbin,/usr/sbin中
 
 ps就是一个外部命令 可以用which和type来找它
 
 
 外部命令执行时 会创建一个子进程 称为衍生forking
 
 发送信号可以是进程间通过信号通信
 
cd exit 内建命令
可用type查看是否为内建
type -a echo 查看命令的不同实现
which 只能显示外部命令文件


history
!!上一条命令
存在用户目录下.bash_history里
bash命令历史先存在内存 shell退出才写入文件
强制写入文件 history -a
多个终端更新历史文件 history -n

alias
-p 查看当前可用的别名
alias skls='ls -li'


第六章

查看全局变量
env 或者printenvw

显示个别环境变量的值
printenv HOME
echo $HOME
ls $HOME 操作环境变量

生成局部变量 my_variable=123 等号之间不能有空格 变量里有空格需要加引号
echo $my_variable
变成全局变量 export my_variable
删除环境变量 unset my_variable
使用变量加$ 操作变量不加$
子进程中的操作对父进程无效

环境变量持久化 写入$HOME/.bashrc文件
root@sk-VirtualBox:~# vim /root/.bashrc
root@sk-VirtualBox:~# source .bashrc

第七章
/etc/passwd 存储用户名 linux给不同功能创建不同的帐户 出于安全 系统帐户uid500以下

/etc/shadow 存储加密后密码 只有root 能看

 useradd 使用系统默认值来设置用户帐户
 useradd -D 显示默认值 默认添加到gid为100的公共组
 
userdel -r sk 删除用户和用户目录

usermod 
-l 修改帐户登录名
-L 锁定帐户
-p 修改帐户密码
-U 解除锁定

passwd test 修改test用户密码

groupadd shared 创建新的组
/etc/group  组信息

usermod -G shared test 把test添加到新组中 -g会替换掉默认组 -G不影响
groupmod -n newname oldname 修改组信息

ll
r 读 w 写 x 执行 r=4,w=2,x=1
三组权限分别代表  所属主 所属组成员 其他用户的权限

chmod 

chown 修改文件的属主
chown dan file
chown dan.shared file  修改文件的属主和属组
chown .shared file    修改文件的属组

第八章 管理文件系统
ext 文件系统 extended filesystem
ext2 第二代扩展文件系统
ext3
ext4

第九章 安装软件
yum list installed
yum provides file_name 查看文件属于哪个软件包
yum 仓库 /etc/yum.repos.d/

源码安装
./configure 检查系统 查看是否具备正确的库依赖关系
make 构建二进制文件
make install

第





















 
 












 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 


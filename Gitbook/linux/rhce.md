应用层 内核 shell交互

内部命令：内核理解

外部命令:shell来解释这个命令

type cd  没有路径 说明是内部命令

type vim 显示路径 说明是外部命令

80%外部命令

history 显示可1K条 文件可以更多

history -a -r 同步去文件

history

-a  终端1执行  保存到~/.bash\_history

-r  终端2执行  从~/.bash\_history 获取历史

history -c 清除历史

！！上一条命令

!$ 上一条命令的参数

!vim 执行最近执行的命令

alt + .  调出上次执行的最后一个参数 如果只有命令 =就只调命令

~ 当前用户的家目录

～+用户名 其他用户的家目录

pwd

ctrl + a  命令行最前  +e 命令行最后 +u  前面全删 +k 后面全删

cat 不打开文件  全部显示文件内容

less 分页显示 不能编辑 q退出 man 是用less分页

head -n 显示头部多少行 -f 递增

tail -n -f

wc 显示文本字符数 -l 仅显示行数

ctrl+l =clean 清屏

命令 +单字符参数用-  +单词 用--

多个命令 用;分隔

获取帮助

whatis date  显示用法和含义

--help 获得一部分最常用的

man ls  =&gt;less页面

man -k disk 模糊查找关于disk的命令

man 5 pwd 5为章节号

info 比man 丰富 排版不好

---

目录

/ 根目录 树状展开

大小写敏感

/bin   shell外部命令

/sbin system 系统命令

/boot 开机启动脚本

/dev 设备目录一切设备都虚拟成文件

/etc 所有配置

/home 除了root的用户的家目录

/run 动态配置

/tmp 临时文件

/usr/bin 根目录的bin实际目录

/usr/sbin 根目录的sbin 实际目录

/var 缓存 日志

/lib 库文件 内核调用相应的源文件

windows的盘符\(c d e\) 就是linux的挂载

文件名不能大于255字符

cd - 上一次的工作目录

cd ~ 家目录

ls -a 查看全部目录 -l 长行式

显示如下 -普通文件 D目录 后面为权限位  后面为硬连接数

ls -R 递归显示 子目录的内容

ls -l -d 显示当前目录的属性

touch 创建空文件 不会进入文件

vim 创建文件 进入文件

rm remove 的缩写 -f force 不询问 -i 交互 询问

mkdir -p /data/d1  \#p=&gt;parent

rmdir 删除目录

rm -rf 全删

cp -r dir1 dir2

cp -p  保持原有属性 所有者 所有组

mv dir1 dir2

file 查看文件类型 防止文件出现乱码

alias 别名

su - sk 切换用户



test


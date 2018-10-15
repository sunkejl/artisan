读后感极客时间-左耳听风专栏文章:Go语言，Docker和新技术。

文章介绍了对待新技术的态度，对于新技术，我们要第一时间开展学习，这样能够抢占技术先机。
在看完陈皓老师的文章后，立马对docker展开入门的学习。

发现容器架构和面向对象编程设计模式有一些相同的地方。

1:隔离性
隔离性高，相互的影响就小。

2:扩展性
开闭原则：对扩展开放，对修改闭合

3:高内聚 低耦合
docker通过共享内核，获得更快的启动的时间
编程也强调代码的复用，减少重复的代码

4:功能单一
一个服务占据一个容器，对应编程中一个类只做一件事


在docker上面，Kubernetes作为服务和容器调度,openshift结合Kubernetes和docker，更方便的管理容器,进而达到devops运维开发的模式

下面结合安装官方mysql容器总结下常用的基本docker命令
查找mysql容器命令
docker search mysql

拉取mysql容器命令
docker pull mysql

创建镜像命令
docker run -e MYSQL_ROOT_PASSWORD=123456 -d -h hostname --name my_mysql mysql

-d 后台运行

-e 设置环境变量

-h 设置hostname 进入容器后显示 root@myhostname

--name 容器别名

-it 分配伪终端

-p 13306:3306 端口转发 本地端口:容器内端口

-v /usr/sbin:/usr/sbin 目录映射 本地目录:容器内目录

进入容器命令
docker exec -it 516 /bin/bash
docker attach 516

查看容器命令
docker ps
-a --all Show all containers (default shows just running)

-q, --quiet  Only display numeric IDs

停止和启动容器
docker stop 516
docker start 516
docker restart 516

查看镜像信息
docker inspect mysql

通过Dockerfile创建容器
1:创建工作目录 mkdir
2:编写Dockerfile vim Dockerfile
3: docker build

Dockerfile 命令
FROM centos
RUN 命令1&&命令2&&命令3
ENV 环境变量
COPY 拷贝文件
CMD 开机自动运行命令
EXPOSE 标注端口

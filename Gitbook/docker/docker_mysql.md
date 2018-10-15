docker search mysql

docker pull mysql

run

```
docker run -e MYSQL_ROOT_PASSWORD=123456 -d mysql

docker run -e MYSQL_ROOT_PASSWORD=123456 -d -h hostname --name my_mysql mysql
 
后台运行
-d
Run container in background and print container ID

设置环境变量
-e
Set environment variables

-h
Container host name
-h myhostname进入容器后显示 root@myhostname

--name 
容器别名  NAMES
Assign a name to the container

-it 分配伪终端
-i, --interactive                    
Keep STDIN open even if not attached

-t, --tty                            
Allocate a pseudo-TTY

端口转发
-p 13306:3306
本地端口:容器内端口

目录映射
-v /usr/sbin:/usr/sbin
本地目录:容器内目录

```


进入容器
```
docker run -it -d -e MYSQL_ROOT_PASSWORD=123456 mysql
docker exec -it 516 /bin/bash


docker run -it -d -e MYSQL_ROOT_PASSWORD=123456 mysql /bin/bash //todo 容器mysql没有启动
通过伪终端run进入容器
docker attach 11id
```


docker ps 显示容器
```
docker ps -aq
-a
--all
Show all containers (default shows just running)

-q, --quiet           
Only display numeric IDs
```

docker stop 11id
docker restart 11id

移除
```
docker rm

把所有容器移除
docker rm $(docker ps -aq)

docker rmi 
移除镜像
```

查看镜像信息
```
docker inspect mysql
Return low-level information on Docker objects

```

查看帮助
```
docker run --help
```

通过dockerfile创建image
Build an image from a Dockerfile
```
Usage:  docker build [OPTIONS] PATH | URL | -

mkdir mysql_ping_dir&&cd mysql_ping_dir

vim Dockerfile
FROM mysql
RUN apt-get update && apt-get install -y iputils-ping && apt-get install sudo
CMD bash

docker build -t MYSQL_ADD_PING_IMAGE_NAME MYSQL_PING_DIR
docker images
```

安装docker
https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-centos-7
官方mysql
https://hub.docker.com/_/mysql/
官方php
https://hub.docker.com/_/php/

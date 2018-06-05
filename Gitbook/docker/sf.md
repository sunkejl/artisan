安装 https://docs.docker.com/installation/centos/
https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-centos-7

service docker start

docker search centos

docker  pull centos

docker images

docker run -t -i centos:latest /bin/bash 

ls -l

mkdir data

cd data

touch index.html

exit

docker commit 8cd0830bb00e sk:v1

docker run -t -i sk:v1 /bin/bash 

docker run -v /opt/www/c:/opt/www/c  -i -t -d -p 49154:5001  centos

docker ps  //查看运行的容器  -a 查看历史

docker attach 进入容器

docker images往往不知不觉就占满了硬盘空间，为了清理冗余的image，可采用以下方法：

1.进入root权限

sudo su

2.停止所有的container，这样才能够删除其中的images：

docker stop $(docker ps -a -q)

如果想要删除所有container的话再加一个指令：

docker rm $(docker ps -a -q)

3.查看当前有些什么images

docker images

4.删除images，通过image的id来指定删除谁

docker rmi <image id>

想要删除untagged images，也就是那些id为<None>的image的话可以用

docker rmi $(docker images | grep "^<none>" | awk "{print $3}")

要删除全部image的话

docker rmi $(docker images -q)




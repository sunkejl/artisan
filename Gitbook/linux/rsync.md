rsync -avz /data/C -e "ssh -p29417" root@23.105.217.208:/data/52\_c



rsync -avz  root@172.16.54.2:/data/r /data

rsync -avz -e "ssh -p29417"  root@23.105.217.208:/data  /c  \#把208的data同步进来

rsync -avz  /data/C  -e "ssh -p29417" root@23.105.217.208:/data/52\_c  \#把本地的C同步给208

参数意义

a  equals -rlptgoD

z  compress


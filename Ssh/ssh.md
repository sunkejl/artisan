客户机 生成公钥私钥，把公钥传给远程服务器，远程服务器把公钥添加到/root/.ssh/authorized_keys
  ssh-keygen
  rsync /root/.ssh/id_rsa.pub 172.16.54.161:/tmp/id_rsa.pub
  vim /root/.ssh/config
```
 Host c
   HostName 172.16.54.161
     User root
     IdentityFile /root/.ssh/id_rsa
```

服务器 172.16.54.161
    cat /tmp/id_rsa.pub >> /root/.ssh/authorized_keys
    
客户机
     ssh c


***
git
github 添加SSH keys 复制/root/.ssh/id_rsa.pub

ssh -T git@github.com
验证是否成功

修改当前项目的config
 vim .git/config
url = git@github.com:sunkejl/artisan.git


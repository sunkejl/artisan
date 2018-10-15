yum install openssh-server
service sshd restart
vim /etc/ssh/sshd_config


客户机 生成公钥私钥，把公钥传给远程服务器，远程服务器把公钥添加到/root/.ssh/authorized_keys
  ssh-keygen
  rsync  /root/.ssh/id_rsa.pub 172.16.54.161:/tmp/id_rsa.pub
  rsync -e 'ssh -p 26574' /root/.ssh/id_rsa.pub 65.49.226.181:/tmp/id_rsa.pub

  vim /root/.ssh/config
```
 Host c
   HostName 172.16.54.161
     User root
     Port 22000
     IdentityFile /root/.ssh/id_rsa
```

服务器 172.16.54.161
    cat /tmp/id_rsa.pub >> /root/.ssh/authorized_keys
    
客户机 直接登录
     ssh c


***
git
github 添加SSH keys 复制/root/.ssh/id_rsa.pub

ssh -T git@github.com
验证是否成功

修改当前项目的config
 vim .git/config
url = git@github.com:sunkejl/artisan.git




ssh 连接 virtualBox ubuntu
sudo apt-get install openssh-server
 
ps -e|grep ssh
 
/etc/init.d/ssh start
 
vim /etc/ssh/sshd_config #修改permitRootLogin yes
 
tail -f /var/log/auth/log
 
sudo service ssh restart
 
sudo passwd #改密码后成功 sudo service ssh reload
 
 
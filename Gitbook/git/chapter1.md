git config --global user.email "你的邮箱"  

git config --global user.name "你的名字"

  
记住密码 git config --global credential.helper store  


ssh地址，但是本地需要生成一个证书（执行下面的命令，要按三次回车）
ssh-keygen -t rsa -C "你的邮箱"  
然后打开文件（linux在~/.ssh/idrsa.pub，window在C:\Users\用户名.ssh\idrsa.pub）,然后在第三方托管平台添加公钥，内容就是这个文件的内容。

恢复一个文件
git 版本号 checkout -- 文件路径  

恢复所有文件
git reset --hard 版本号  


git branch #查看本地分支  
git branch -r #查看远端分支  
git branch -a #查看所有分支，包括本地和远程的  
git branch 分支名 #新建一个分支  
git checkout -b 分支名  远程分支名  #切换到一个分支（注意，本地文件也会变成分支的当前版本的文件）  
git branch -d 分支名 #删除本地分支

  
git branch -vv 查看本地分支和远程的关联  






  
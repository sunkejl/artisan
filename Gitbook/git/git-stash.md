git stash

git stash list

多次stash  
 git stash apply stash@{0}

工作现场还在，Git把stash内容存在某个地方了，但是需要恢复一下，有两个办法：

一是用

git stash apply

恢复，但是恢复后，stash内容并不删除，

你需要用 如: 

git stash drop stash@{0}  
来删除；

另一种方式是用

git stash pop

恢复的同时把stash内容也删了：


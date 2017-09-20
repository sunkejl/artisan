####Git global setup
git config --global user.name "sk"
git config --global user.email "xxx@xxx.com"
####Create a new repository
git clone git@xxxx.git
touch README.md
git add README.md
git commit -m "add README"
git push -u origin master
####Existing folder or Git repository
cd /
git init
git remote add origin git@xxx.git
git push -u origin master


####恢复的操作
git add . 后恢复
git reset

git commit -m "test"  后恢复
git reset HEAD~1(告诉git把commit指针往前挪)

没add的恢复 
git reset --hard

执行了 git reset HEAD~1  git reset --hard 
后想恢复撤销操作
git reflog
找回了你删掉的那个commit
git checkout -b newBranch someReflogBranch

删本地分支
git branch -d branch_name
删除远程分支
git push origin --delete someBranch


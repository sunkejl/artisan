git fetch origin master
git rebase origin/master
git push -f origin_branch local_branch

无需rebase的显示
$ git rebase origin/master
Current branch pmt-46053 is up to date.


google git 把多次提交合并成一个
git rebase -i #hash数字#


私有git reset --hard #hash ,push -f
公共git revert #hash


这两种整合方法的最终结果没有任何区别，但是变基使得提交历史更加整洁。
你在查看一个经过变基的分支的历史记录时会发现，尽管实际的开发工作是并行的，
但它们看上去就像是串行的一样，提交历史是一条直线没有分叉。

Caps v 选择当前一整行 shift+v

:e ~/.vimrc 当前窗口打开

$MYVIMRC

tabedit  $MYVIMRC  新tab打开 关闭q 或者bd

e $MYVIMRC  当前tab打开

在vimrc中 :so % \# 使配置生效 source it  之前先要w 保存一下 。03lession中 可以自动source it

:tabc =tabclose 关闭tab

:bd buffer delete

:bp buffer previous

:buffers 



---

mapings

imap insert model

nmap normal model

nmap ,,ev :tabedit $MYVIMRC        ,,ev = tabeedit ...

nmap ,,ev :tabedit $MYVIMRC&lt;cr&gt;   加上回车

set hlsearch

set nohlsearch

zz  编辑行剧中




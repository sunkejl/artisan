"显示行号

set number

"自动缩进

set autoindent

"不换行

set nowrap

"制表符

set tabstop=5

"使用每层缩进的空格数

set shiftwidth=4

"背景颜色

colorscheme desert

---

iterm2

If you are using iTerm2, you can copy text in Tmux session, holding down theOptionkey while dragging the mouse to make selection.

Then it should be possible to paste text anywhere withCmd+Vas usual

set number

syntax enable

colorscheme desert

set backspace=indent,eol,start

set tabstop=4

---

nmap ,,ev :tabedit $MYVIMRC&lt;cr&gt;   加上回车

---

url =[http://learnvimscriptthehardway.onefloweroneworld.com/chapters/02.html](http://learnvimscriptthehardway.onefloweroneworld.com/chapters/02.html)

$MYVIMRC是指定你的~/.vimrc文件的特殊Vim变量 echo $MYVIMRC   vsplit $MYVIMRC  
set number? 查看number的状态

echo "&gt;^.^&lt;"  
"显示行号 set nonumbe不显示行号 set number?显示行号状态  
set number  
"自动缩进  
set autoindent  
"不换行  
set nowrap  
"制表符  
set tabstop=4  
"使用每层缩进的空格数  
set shiftwidth=4  
"背景  
colorscheme desert  
" 高亮显示当前行/列  
"set cursorline  
"set cursorcolumn  
" 禁止折行 超出屏幕是否换行  
set nowrap  
"set encoding=utf-8  
"set termencoding=utf-8  
set fileencodings=utf-8,ucs-bom,gb18030,gbk,gb2312,cp936  
"文件类型侦探  
filetype on  
" vim 自身命令行模式智能补全  
set wildmenu

---

windows gvim安装路径下，文件名为“\_vimrc”

 linux "~/.vimrc"（~表示个人主目录）   

u 撤销操作  

对应 ctrl+r 重做     

1 "显示行号   

2 set number   

3 "自动缩进   

4 set autoindent   

5 "不换行   

6 set nowrap  

 7 "制表符   

8 set tabstop=4


Vundle is short for Vim bundle and is a Vim plugin manager.

git clone [https://github.com/VundleVim/Vundle.vim.git](https://github.com/VundleVim/Vundle.vim.git) ~/.vim/bundle/Vundle

```
set nocompatible              " be improved, required
filetype off                  " required

" set the runtime path to include vundle and initialize
set rtp+=~/.vim/bundle/vundle.vim
call vundle#begin()
" alternatively, pass a path where vundle should install plugins
"call vundle#begin('~/some/path/here')

" let vundle manage vundle, required
plugin 'vundlevim/vundle.vim'
plugin 'scrooloose/nerdtree'

" all of your plugins must be added before the following line
call vundle#end()            " required
filetype plugin indent on    " required
" to ignore plugin indent changes, instead use:
"filetype plugin on
" Put your non-Plugin stuff after this line
```

so %

:PluginInstall

:NERDTree  
  \#调出NERDTree  
常用配置

http://yang3wei.github.io/blog/2013/01/29/nerdtree-kuai-jie-jian-ji-lu/


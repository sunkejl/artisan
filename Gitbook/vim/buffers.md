A buffer is a file loaded into memory for editing.  The original file remains

unchanged until you write the buffer to the file.

`:buffers`

命令将会列出当前编辑中所有的缓冲区状态

如果要选择一个缓冲区，可以使用

`:buffer number`

命令，number就是缓冲区状态列表中所显示的数字。我们也可以用文件名来选择缓冲区：

`:buffer file`



切换缓冲区

`:bnext`到下一个缓冲区；`:bprevious`或`:bNext`到前一个缓冲区；`:blast`到最后一个缓冲区；`:bfirst`到第一个缓冲区。



删除缓冲区

可以使用`:bdelete filename`、`:bdelete 3`或`:3 bdelete`命令来删除一个缓冲区。也可以用`:1,3 bdelete`命令来删除指定范围的缓冲区。


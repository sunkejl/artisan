开机 破解root密码  第一道题

e编辑

倒数 第二行最后位置 rd.break

ctrl+x执行

mount -o remount ,rw /sysroot

chroot /sysroot

passwd root

touch /.autorelabel

exit

exit


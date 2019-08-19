gcc a.c -g

gdb a.out

```gdb
break 1
run

```
 
gdb 打印浮点型
(gdb) help x
Examine memory: x/FMT ADDRESS.
ADDRESS is an expression for the memory address to examine.
FMT is a repeat count followed by a format letter and a size letter.
Format letters are o(octal), x(hex), d(decimal), u(unsigned decimal),
  t(binary), f(float), a(address), i(instruction), c(char) and s(string).
Size letters are b(byte), h(halfword), w(word), g(giant, 8 bytes).
The specified number of objects of the specified size are printed
according to the format.
 
Defaults for format and size letters are those previously used.
Default count is 1.  Default address is following last thing printed
with this command or "print".
 
 
(gdb) x/24bt &y
0x7fffffffe5d8: 00000010        00000000        00000000        00000000        00000001        00000000        00000000        00000000
0x7fffffffe5e0: 00000000        00000000        00000000        00000000        00000000        00000000        00000000        00000000
0x7fffffffe5e8: 00100000        00000100        01000000        00000000        00000000        00000000        00000000        00000000

 
(gdb) print /f 1
$12 = 1.40129846e-45


[bookermarks](https://blog.csdn.net/haoel/article/details/2879)
 
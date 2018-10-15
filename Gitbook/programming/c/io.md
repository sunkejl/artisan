Character Input and Output
字符的输入和输出
getchar reads one character from the ``standard input,''

if there are no more characters available, the special value EOF (``end of file''). ctrl+z 输入EOF

```
#include <stdio.h>
void main(){
        int c;
        c=getchar();
        while(c!=EOF){
                putchar(c);
                c=getchar();
        }

}
```
When you hit RETURN, a full line of characters is made available to your program. 
It then zips several times through its loop, 
reading and printing all the characters in the line in quick succession. 
In other words, when you run this program, 
it will probably seem to copy the input a line at a time, 
rather than a character at a time. 
You may wonder how a program could instead read a character right away, without waiting for the user to hit RETURN. 
That's an excellent question, but unfortunately the answer is rather complicated, and beyond the scope of our discussion here. (Among other things, how to read a character right away is one of the things that's not defined by the C language, and it's not defined by any of the standard library functions, 
either. How to do it depends on which operating system you're using.)
并没有一个字符一个字符输出，而是一行的输出

上面的代码简写
```
	while((c = getchar()) != EOF)
		putchar(c);
```
 
 
It stops when it receives end-of-file (EOF), 
but how do you send EOF? The answer depends on what kind of computer you're using. 
On Unix and Unix-related systems, it's almost always control-D. 
On MS-DOS machines, it's control-Z followed by the RETURN key. 
Under Think C on the Macintosh, it's control-D, just like Unix. 
On other systems, you may have to do some research to learn how to send EOF.


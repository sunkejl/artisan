Strings in C are represented by arrays of characters. The end of the string is marked with a special character, the null character, which is simply the character with the value 0.
字符串是一个由字符组成的数组

If you have a string:
```
	char string[] = "hello, world!";
```
you can modify its first character by saying
```c
	string[0] = 'H';
```
单引号是字符，双引号是字符串
```
	string[0] = "H";		/* WRONG */
```
because "H" is a string (an array of characters), not a single character. 


On the other hand, when you need a string, you must use a string. To print a single newline, you could call
```chef
	printf("\n");
```
It would not be correct to call
```chef
	printf('\n');			/* WRONG */
```
printf always wants a string as its first argument. 
(As one final example, putchar wants a single character, 
so putchar('\n') would be correct, and putchar("\n") would be incorrect.)

int i = '1';
we will probably not get the value 1 in i; 
we'll get the value of the character '1' in the machine's character set. (In ASCII, it's 49.) 

http://c-faq.com/~scs/cclass/notes/sx8.html

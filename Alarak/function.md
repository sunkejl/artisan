方法的哲学
Function Philosophy
What makes a good function? The most important aspect of a good ``building block'' is that have a single, well-defined task to perform. When you find that a program is hard to manage, it's often because it has not been designed and broken up into functions cleanly. Two obvious reasons for moving code down into a function are because:

1. It appeared in the main program several times, such that by making it a function, it can be written just once, and the several places where it used to appear can be replaced with calls to the new function.

2. The main program was getting too big, so it could be made (presumably) smaller and more manageable by lopping part of it off and making it a function.

These two reasons are important, and they represent significant benefits of well-chosen functions, but they are not sufficient to automatically identify a good function. As we've been suggesting, a good function has at least these two additional attributes:

3. It does just one well-defined task, and does it well.
只做一件事

4. Its interface to the rest of the program is clean and narrow.

函数的参数 不能过多

a good function is a ``black box,'' When you call a function, you only have to know what it does, not how it does it. 
好的方法像一个黑盒 不需要关心 如何实现


http://c-faq.com/~scs/cclass/notes/sx5c.html

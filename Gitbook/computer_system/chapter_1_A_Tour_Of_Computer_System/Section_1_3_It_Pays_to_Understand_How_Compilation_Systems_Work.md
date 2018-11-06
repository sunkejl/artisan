Section 1.3 It Pays to Understand How Compilation Systems Work


For simple programs such as hello.c, we can rely on the compilation system to produce correct and efficient machine code. 

However, there are some important reasons why programmers need to understand how compilation systems work:

Optimizing program performance.

Modern compilers are so phisticated tools that usually produce good code. 

As programmers, we do not need to know the inner workings of the compiler in order to write efficient code. 

However,in order to make good coding decisions in our C programs,  

we do need a basic understanding of machine-level code and how the compiler translates different C statements into machine code. 

For example, is a switch statement always more efficient than a sequence of if-else statements?  

How  much overhead is incurred by a function call? 

Is a while loop more efficient than a for loop? 

Are pointer references more efficient than array indexes? 

Why does our loop run so much faster if we sum into a local variable instead of anargument that is passed by reference? 

How can a function run faster when we simply rear range the parentheses in an arithmetic expression?

In Chapter 3, we will introduce two related machine languages: IA32, the32-bit code that has become ubiquitous on machines running Linux, Windows,

and more recently the Macintosh operating systems, and x86-64, 

a 64-bit extension found in more recent microprocessors. 

We describe how compilers translate different C constructs into these languages. 

In Chapter 5, you will learn how to tune the performance of your C programs by making simple transformations to the C code that help  the compiler do its job better.

In Chapter 6, you will learn about the hierarchical nature of the memory system,

how C compilers store data arrays in memory, 

and how your C programs can exploit this knowledge to run more efficiently.

Understanding link-time errors.

In our experience, some of the most perplex-ing programming errors are related to the operation of the linker, 

especially when you are trying to build large software systems. 

For example, what does it mean when the linker reports that it can not resolve a reference? 

What is the difference between a static variable and a global variable? 

What happens if you define two global variables in different C files with the same name? 

What is the difference between a static library and a dynamic library? 

Why does it matter what order we list libraries on the command line? 

And scariest of all,why do some linker-related errors not appear until run time?

You will learn the answers to these kinds of questions in Chapter 7.

Avoiding security holes.

For many years,

buffer overflow vulnerabilities have accounted for the majority of security holes in network and Internet servers.

These vulnerabilities exist because too few programmers understand the need to carefully restrict the quantity and forms of data they accept from untrustedsources. 

A first step in learning secure programming is to understand the con-sequences of the way data and control information are stored on the program stack.  

We cover the stack discipline and buffer overflow vulnerabilities in Chapter 3 as part of our study of assembly language. 

We will also learn about methods that can be used by the programmer, compiler, and operating system to reduce the threat of attack.

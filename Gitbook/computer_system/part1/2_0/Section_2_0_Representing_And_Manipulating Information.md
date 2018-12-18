Representing and Manipulating Information

Modern computers store and process information represented as 2-valued signals.

These lowly binary digits, or bits, form the basis of the digital revolution. 

The familiar decimal, or base-10, 

representation has been in use for over 1000 years, having been developed in India, 

improved by Arab mathematicians in the 12th century, 

and brought to the West in the 13th century by the Italian mathematician Leonardo Pisano (c. 1170 – c. 1250), 
better known as Fibonacci. 

Using decimal notation is natural for ten-fingered humans, 

but binary values work better when building machines that store and process information. 

Two-valued signals can readily be represented, stored, and transmitted, 

for example, as the presence or absence of a hole in a punched card, 

as a high or low voltage on a wire, or as a magnetic domain oriented clockwise or counterclockwise. 

The electronic circuitry for storing and performing computations on 2-valued signals is very simple and reliable, 

enabling manufacturers to integrate millions, or even billions, 

of such circuits on a single silicon chip.

In isolation, a single bit is not very useful. 

When we group bits together and apply some interpretation that gives meaning to the different possible bit patterns,

however, we can represent the elements of any finite set. 

For example, using a binary number system, we can use groups of bits to encode non negative numbers.

By using a standard character code, we can encode the letters and symbols in a document. 

We cover both of these encodings in this chapter, 

as well as encodings to represent negative numbers and to approximate real numbers.

We consider the three most important representations of numbers. 

Unsigned encodings are based on traditional binary notation, 

representing numbers greater than or equal to 0. 

Two’s-complement encodings are the most common way to represent signed integers, 

that is, numbers that may be either positive or negative. 

Floating-point encodings are a base-two version of scientific notation for representing real numbers. 

Computers implement arithmetic operations, such as addition and multiplication, 

with these different representations, similar to the corresponding operations on integers and real numbers.

Computer representations use a limited number of bits to encode a number,

and hence some operations can overflow when the results are too large to be represented. 

This can lead to some surprising results. 

For example, on most of today’s computers 

(those using a 32-bit representation of data type int), 

computing the expression

```
200 * 300 * 400 * 500

```

yields −884,901,888. 

This runs counter to the properties of integer arithmetic computing the product of a set of positive numbers has yielded a negative result.

On the other hand, 

integer computer arithmetic satisfies many of the familiar properties of true integer arithmetic. 

For example, multiplication is associative and commutative, 

so that computing any of the following C expressions yields

```
−884,901,888:
(500
((500
((200
400
* 400) * (300 * 200)
* 400) * 300) * 200
* 500) * 300) * 400
* (200 * (300 * 500))

```

The computer might not generate the expected result, but at least it is consistent!

Floating-point arithmetic has altogether different mathematical properties.

The product of a set of positive numbers will always be positive, 

although overflow will yield the special value +∞. 

Floating-point arithmetic is not associative,

due to the finite precision of the representation. 

For example, the C expression (3.14+1e20)-1e20 will evaluate to 0.0 on most machines, 

while 3.14+(1e20- 1e20) will evaluate to 3.14. 

The different mathematical properties of integer vs. floating-point arithmetic stem from the difference 

in how they handle the finiteness of their representations—integer representations can encode a comparatively small range of values, 

but do so precisely, while floating-point representations can encode a wide range of values, but only approximately.

By studying the actual number representations, 

we can understand the ranges of values that can be represented and the properties of the different arithmetic operations. 

This understanding is critical to writing programs that work correctly over the full range of numeric values 

and that are portable across different combinations of machine, operating system, and compiler. 

As we will describe, a number of computer security vulnerabilities have arisen due to some of the subtleties of computer arithmetic. 

Whereas in an earlier era program bugs would only inconvenience people when they happened to be triggered, 

there are now legions of hackers who try to exploit any bug they can find to obtain unauthorized access to other people’s systems. 

This puts a higher level of obligation on programmers to understand how their programs work and how they can be made to behave in undesirable ways.

Computers use several different binary representations to encode numeric values. 

You will need to be familiar with these representations as you progress into machine-level programming in Chapter 3. 

We describe these encodings in this chapter and show you how to reason about number representations.

We derive several ways to perform arithmetic operations by directly manipulating the bit-level representations of numbers. 

Understanding these techniques will be important for understanding the machine-level code 

generated by compilers in their attempt to optimize the performance of arithmetic expression evaluation.

Our treatment of this material is based on a core set of mathematical principles. 

We start with the basic definitions of the encodings and then derive such properties as the range of representable numbers, 

their bit-level representations, and the properties of the arithmetic operations. 

We believe it is important for you to examine the material from this abstract viewpoint, 

because programmers need to have a clear understanding of how computer arithmetic relates to the more familiar integer and real arithmetic.

Aside
How to read this chapter

If you find equations and formulas daunting, do not let that stop you from getting the most out of this chapter! 

We provide full derivations of mathematical ideas for completeness, 

but the best way to read this material is often to skip over the derivation on your initial reading. 

Instead, study the examples provided, and be sure to work all of the practice problems. 

The examples will give you an intuition behind the ideas, 

and the practice problems engage you in active learning, 

helping you put thoughts into action. With these as background, you will find it much easier to go back and follow the derivations.

Be assured, as well, that the mathematical skills require to understand this material 

are within reach of someone with good grasp of high school algebra.

The C++ programming language is built upon C, using the exact same numeric representations and operations. 

Everything said in this chapter about C also holds for C++. 

The Java language definition, on the other hand, created a new set of standards for numeric representations and operations. 

Whereas the C standards are designed to allow a wide range of implementations, 

the Java standard is quite specific on the formats and encodings of data. 

We highlight the representations and operations supported by Java at several places in the chapter.

Aside

The evolution of the C programming language

As was described in an aside in Section 1.2, 

the C programming language was first developed by Dennis Ritchie of Bell Laboratories 
for use with the Unix operating system (also developed at Bell Labs). 

At the time, most system programs, such as operating systems, had to be written largely in assembly code,

in order to have access to the low-level representations of different data types. 

For example, it was not feasible to write a memory allocator, 

such as is provided by the malloc library function, in other high-level languages of that era.

The original Bell Labs version of C was documented in the first edition of the book by Brian Kernighan and Dennis Ritchie [57]. 

Over time, C has evolved through the efforts of several standardization groups. 

The first major revision of the original Bell Labs C led to the ANSI C standard in 1989,

by a group working under the auspices of the American National Standards Institute. 

ANSI C was a major departure from Bell Labs C, especially in the way functions are declared. 

ANSI C is described in the second edition of Kernighan and Ritchie’s book [58], 

which is still considered one of the best references on C.

The International Standards Organization took over responsibility for standardizing the C language, 

adopting a version that was substantially the same as ANSI C in 1990 and hence is referred to as “ISO C90.” 

This same organization sponsored an updating of the language in 1999, yielding “ISO C99.”

Among other things, this version introduced some new data types and provided support for text strings requiring characters not found in the English language.

The GNU Compiler Collection (gcc) can compile programs according to the conventions of several different versions of the C language, 

based on different command line options, as shown in Figure 2.1.

For example, to compile program prog.c according to ISO C99, we could give the command line

```
unix> gcc -std=c99 prog.c
```

The options -ansi and -std=c89 have the same effect—the code is compiled according to the ANSI or ISO C90 standard. 

(C90 is sometimes referred to as “C89,” since its standardization effort began in 1989.) 

The option -std=c99 causes the compiler to follow the ISO C99 convention.

```
Figure 2.1 Specifying different versions of C to gcc.
C version gcc command line option
GNU 89
ANSI, ISO C90
ISO C99
GNU 99 none, -std=gnu89
-ansi , -std=c89
-std=c99
-std=gnu99

```
As of the writing of this book, when no option is specified, 

the program will be compiled according to a version of C based on ISO C90, 

but including some features of C99, some of C++, and others specific to gcc. 

This version can be specified explicitly using the option -std=gnu89. 

The GNU project is developing a version that combines ISO C99, 

plus other features, that can be specified with command line option -std=gnu99. 

(Currently, this implementation is incomplete.) This will become the default version.

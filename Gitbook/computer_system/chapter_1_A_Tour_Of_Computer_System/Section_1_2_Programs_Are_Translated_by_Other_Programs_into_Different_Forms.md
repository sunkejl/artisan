Section 1.2  Programs Are Translated by Other Programs into Different Forms

The hello program begins life as a high-level C program because it can be read and understood by human beings in that form. 

However, in order to run hello.c on the system,
the individual C statements must be translated by other programs into a sequence of low-level machine-language instructions. 

These instructions are then packaged in a form called an executable object program and stored as a binary disk file. 

Object programs are also referred to as executable object files.

On a Unix system, the translation from source file to object file is performedby a compiler driver:

unix>gcc -o hello hello.c

Here, the gcc compiler driver reads the source file hello.c and translates it into an executable object filehello.

The translation is performed in the sequence of four phases shown in Figure 1.3. 

The programs that perform the four phases
(
preprocessor,
compiler,
assembler,
and linker
) 
are known collectively as the compilation system.

Preprocessing phase.
The preprocessor (cpp) modifies the original C program according to directives that begin with the # character.

For example,the # include <stdio.h> command in line 1 of hello.c tells the preprocessor to read the contents of the system header file stdio.h and insert it directly into the program text. 

The result is another C program, typically with the.i suffix.

Compilation phase.

The compiler (cc1) translates the text file hello.i into the text file hello.s,  

which contains anassembly-language program. 

Each statement in an assembly-language program exactly describes one low-levelmachine-language instruction in a standard text form. 

Assembly language is useful because it provides a common output language for different compilers for different high-level languages.

For example,C compilers and Fortran compilers both generate output files in the same assembly language.

Assembly phase.

Next, the assembler (as) translates hello.s into machine-language instructions, 

packages them in a form known as are locatable object program, and stores the result in the object file hello.o.

The hello.o file is a binary file whose bytes encode machine language instructions rather than characters. 

If we were to view hello.o with a text editor, it would appear to be gibberish.

Linking phase.

Notice that our hello program calls the printf function, which is part of the standard C library provided by every C compiler.

The printf function resides in a separate precompiled object file called printf.o, 

which must some how be merged with our hello.o program. 

The linker (ld) handles this merging. 

The result is the hello file, which is an executable object file(or simply executable) that is ready to be loaded into memory and executed by the system.


Aside 
The GNU project GCC is one of many useful tools developed by the GNU (short for GNU’s Not Unix) project. 

The GNU project is a tax-exempt charity started by Richard Stallman in 1984, 

with the ambitious goal of developing a complete Unix-like system whose source code is unencumbered by restrictions on how it can be modified or distributed. 

The GNU project has developed an environment with all the major components of a Unix operating system,
except for the kernel, which was developed separately bythe Linux project. 

The GNU environment includes the emacs editor,
gcc compiler,
gdb debugger,
assembler,  
linker,  
utilities  
for manipulating binaries,  
and other components.  

The gcc compiler has grown to support many different languages,  
with the ability to generate code for many differentmachines. 

Supported languages include C, C++, Fortran, Java, Pascal, Objective-C, and Ada.

The GNU project is a remarkable achievement, and yet it is often overlooked. 

The modern open-source movement (commonly associated with Linux) owes its intellectual origins to the GNU project’snotion offree software(“free” as in “free speech,” not “free beer”).

Further, Linux owes much of itspopularity to the GNU tools, which provide the environment for the Linux kernel.

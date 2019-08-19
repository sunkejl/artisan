1.9.2
The Importance of Abstractions in Computer Systems

The use of abstractions is one of the most important concepts in computer science.

For example, 

one aspect of good programming practice is to formulate a simple application-program interface (API) 

for a set of functions that allow programmers to use the code without having to delve into its inner workings. 

Different programming languages provide different forms and levels of support for abstraction, 

such as Java class declarations and C function prototypes.

We have already been introduced to several of the abstractions seen in computer systems, 

as indicated in Figure 1.18. 

On the processor side, 

the instruction set architecture provides an abstraction of the actual processor hardware. 

With this abstraction, 

a machine-code program behaves as if it were executed on a processor that performs just one instruction at a time. 

The underlying hardware is far more elaborate, executing multiple instructions in parallel, 

but always in a way that is consistent with the simple, sequential model. 

By keeping the same execution model, 

different processor implementations can execute the same machine code, 

while offering a range of cost and performance.

On the operating system side, we have introduced three abstractions: 

**files as an abstraction of I/O,**

**virtual memory as an abstraction of program memory,**

**and processes as an abstraction of a running program.**

To these abstractions we add a new one: the virtual machine, 

providing an abstraction of the entire computer,

including the operating system, 

the processor, and the programs. 

The idea of a virtual machine was introduced by IBM in the 1960s, 

but it has become more prominent recently as a way to manage computers that 

must be able to run programs designed for multiple operating systems 

(such as Microsoft Windows, MacOS, and Linux) or different versions of the same operating system.

We will return to these abstractions in subsequent sections of the book.
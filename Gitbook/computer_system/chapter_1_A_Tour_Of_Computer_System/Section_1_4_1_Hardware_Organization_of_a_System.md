1.4.1 Hardware Organization of a System

To understand what happens to our hello program when we run it, 

we need to understand the hardware organization of a typical system, which is shown in Figure 1.4.

This particular picture is modeled after the family of Intel Pentium systems,

but all systems have a similar look and feel.

Don’t worry about the complexity of this figure just now. 

We will get to its various details in stages through out the course of the book.

Buses Running through out the system is a collection of electrical conduits called buses that carry bytes of information back and forth between the components. 

Buses are typically designed to transfer fixed-sized chunks of bytes known aswords.

The number of bytes in a word (the word size) is a fundamental system parameter that varies across systems. 

Most machines today have word sizes of either 4 bytes (32bits) or 8 bytes (64 bits). 

For the sake of our discussion here, we will assume a word size of 4 bytes, 

and we will assume that buses transfer only one word at a time.

I/O Devices Input/output (I/O) devices are the system’s connection to the external world. 

Our example system has four I/O devices: 

a keyboard and mouse for user input,

a display for user output, 

and a disk drive (or simply disk) for long-term storage of data and programs. 

Initially, the executable hello program resides on the disk.

Each I/O device is connected to the I/O bus by either a controlleror an adapter.

The distinction between the two is mainly one of packaging. 

Controllers are chipsets in the device itself or on the system’s main printed circuit board (often called the motherboard). 

An adapter is a card that plugs into a slot on the motherboard.

Regardless, the purpose of each is to transfer information back and forth betweenthe I/O bus and an I/O device.

Chapter 6 has more to say about how I/O devices such as disks work. 

In Chapter 10, you will learn how to use the Unix I/O interface to access devices from your application programs. 

We focus on the especially interesting class of devices known as networks, 

but the techniques generalize to other kinds of devices as well.

Main Memory 

The main memoryis a temporary storage device that holds both a program and the data it manipulates while the processor is executing the program. 

Physically,main memory consists of a collection of dynamic random access memory(DRAM) chips. 

Logically, memory is organized as a linear array of bytes, 

each with its own unique address (array index) starting at zero. 

In general, each of the machine instructions that constitute a program can consist of a variable number of bytes.

The sizes of data items that correspond to C program variables vary according to type. 

For example, on an IA32 machine running Linux, data of type shortrequires two bytes, types int,float, and long four bytes, and type double eight bytes.

Chapter 6 has more to say about how memory technologies such as DRAM chips work, 
and how they are combined to form main memory.

Processor 

The central processing unit(CPU), or simply processor, is the engine that inter-prets (or executes) instructions stored in main memory.

at its core is a word-sized storage device (or register) called the program counter(pc). 

at any point in time,the pc points at (contains the address of) some machine-language instruction in main memory.

1 from the time that power is applied to the system,  

until the time that the power is shut off, 

a processor repeatedly executes the instruction pointed at by theprogram counter and updates the program counter to point to the next instruction.

a processor appears to operate according to a very simple instruction execution model, defined by its instruction set architecture. 

in this model, instructions execute in strict sequence, and executing a single instruction involves performing a series of steps.  

the processor reads the instruction from memory pointed at by the program counter (pc), 

interprets the bits in the instruction, performs some simple operation dictated by the instruction, 

and then updates the pc to point to the next instruction, which may or may not be contiguous in memory to the instruction that was just executed.

there are only a few of these simple operations,and they revolve around main memory, 

the register file, and the arithmetic/logic unit(alu). 

the register file is a small storage device that consists of a collection of word-sized registers, 

each with its own unique name. 

the alu computes new data and address values.

here are some examples of the simple operations that the cpu might carry outat the request of an instruction:

.Load:Copy a byte or a word from main memory into a register, overwriting the previous contents of the register.

.Store:Copy a byte or a word from a register to a location in main memory,overwriting the previous contents of that location.

.Operate:Copy the contents of two registers to the ALU, perform an arithmetic operation on the two words, and store the result in a register, overwriting the previous contents of that register.

.Jump:Extract a word from the instruction itself and copy that word into the program counter (PC), overwriting the previous value of the PC.

We say that a processor appears to be a simple implementation of its in-struction set architecture, 

but in fact modern processors use far more complex mechanisms to speed up program execution. 

Thus,  we can distinguish the pro-cessor’s instruction set architecture, describing the effect of each machine-code instruction, 

from its micro architecture, describing how the processor is actually implemented. 

When we study machine code in Chapter 3, we will consider the abstraction provided by the machine’s instruction set architecture. 

Chapter 4 has more to say about how processors are actually implemented.

2.1
Information Storage

Rather than accessing individual bits in memory, 

most computers use blocks of eight bits, or bytes, as the smallest addressable unit of memory. 

A machine-level program views memory as a very large array of bytes, 
referred to as virtual memory. 

Every byte of memory is identified by a unique number, known as its address, 

and the set of all possible addresses is known as the virtual address space.

As indicated by its name, this virtual address space is just a conceptual image presented to the machine-level program. 

The actual implementation (presented in Chapter 9) uses a combination of random-access memory (RAM), 
disk storage,
special hardware, 
and operating system software to provide the program with what appears to be a monolithic byte array.

In subsequent chapters, 
we will cover how the compiler and run-time system partitions this memory space into 
more manageable units to store the different program objects, 
that is, program data, instructions, and control information.

Various mechanisms are used to allocate and manage the storage for different parts of the program. 

This management is all performed within the virtual address space. 

For example, the value of a pointer in C—whether it points to 
an integer,
a structure, 
or some other program object—is the virtual address of the first byte of some block of storage. 

The C compiler also associates type information with each pointer, 

so that it can generate different machine-level code to access the value 
stored at the location designated by the pointer depending on the type of that value. 

Although the C compiler maintains this type information, 

the actual machine-level program it generates has no information about data types. 

It simply treats each program object as a block of bytes, 

and the program itself as a sequence of bytes.

New to C?

The role of pointers in C Pointers are a central feature of C. 

They provide the mechanism for referencing elements of data structures, including arrays. 

Just like a variable, a pointer has two aspects: 
its value and its type. 
The value indicates the location of some object, 

while its type indicates what kind of object (e.g., integer or floating-point number) is stored at that location.
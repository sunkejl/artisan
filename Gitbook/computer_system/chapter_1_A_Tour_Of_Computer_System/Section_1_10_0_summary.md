1.10 Summary

A computer system consists of hardware and systems software that cooperate to run application programs. 

Information inside the computer is represented as groups of bits that are interpreted in different ways, 
depending on the context.

Programs are translated by other programs into different forms, 

beginning as ASCII text and then translated by compilers and linkers into binary executable files.

Processors read and interpret binary instructions that are stored in main memory. 

Since computers spend most of their time copying data between memory, I/O devices, and the CPU registers, 

the storage devices in a system are arranged in a hierarchy, 

with the CPU registers at the top, 

followed by multiple levels of hardware cache memories, 

DRAM main memory, 

and disk storage. 

Storage devices that are higher in the hierarchy are faster and more costly per bit than
those lower in the hierarchy. 

Storage devices that are higher in the hierarchy serve as caches for devices that are lower in the hierarchy. 

Programmers can optimize the performance of their C programs by understanding and exploiting the memory hierarchy.

**The operating system kernel serves as an intermediary between the application and the hardware.**

It provides three fundamental abstractions: 

(1) Files are abstractions for I/O devices. 

(2) Virtual memory is an abstraction for both main memory and disks. 

(3) Processes are abstractions for the processor, main memory, and I/O devices.

Finally, networks provide ways for computer systems to communicate with one another. 

From the viewpoint of a particular system, the network is just another I/O device.

Bibliographic Notes

Ritchie has written interesting first hand accounts of the early days of C and
Unix. 

Ritchie and Thompson presented the first published account of Unix [89]. 

Silberschatz, Gavin, and Gagne [98] provide a comprehensive history of the different flavors of Unix. 

The GNU (www.gnu.org) and Linux (www.linux.org) Web pages have loads of current and historical information.

The Posix standards are available online at (www.unix.org).
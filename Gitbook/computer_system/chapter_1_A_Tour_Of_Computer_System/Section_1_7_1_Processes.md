1.7.1
Processes

When a program such as hello runs on a modern system, 

the operating system
provides the illusion that the program is the only one running on the system. 

The
program appears to have exclusive use of both the processor, main memory, and
I/O devices. 

The processor appears to execute the instructions in the program, 

one
after the other, without interruption. 

And the code and data of the program appear
to be the only objects in the system’s memory. 

These illusions are provided by the
notion of a process, 

one of the most important and successful ideas in computer
science.

A process is the operating system’s abstraction for a running program. 

Multi-
ple processes can run concurrently on the same system, 

and each process appears
to have exclusive use of the hardware. 

By concurrently, we mean that the instruc-
tions of one process are interleaved with the instructions of another process. In
most systems, there are more processes to run than there are CPUs to run them.
Traditional systems could only execute one program at a time, while newer multi-
core processors can execute several programs simultaneously. In either case, a
single CPU can appear to execute multiple processes concurrently by having the
processor switch among them. The operating system performs this interleaving
with a mechanism known as context switching. To simplify the rest of this discus-
sion, we consider only a uniprocessor system containing a single CPU. We will
return to the discussion of multiprocessor systems in Section 1.9.1.
The operating system keeps track of all the state information that the process
needs in order to run. This state, which is known as the context, includes infor-
mation such as the current values of the PC, the register file, and the contents
of main memory. At any point in time, a uniprocessor system can only execute
the code for a single process. When the operating system decides to transfer con-
trol from the current process to some new process, it performs a context switch
by saving the context of the current process, restoring the context of the new
process, and then passing control to the new process. The new process picks up
exactly where it left off. Figure 1.12 shows the basic idea for our example hello
scenario.
There are two concurrent processes in our example scenario: the shell process
and the hello process. Initially, the shell process is running alone, waiting for input
on the command line. When we ask it to run the hello program, the shell carries
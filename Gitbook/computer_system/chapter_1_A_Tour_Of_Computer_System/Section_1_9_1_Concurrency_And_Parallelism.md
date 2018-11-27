1.9.1
Concurrency and Parallelism

Throughout the history of digital computers, 

two demands have been constant forces driving improvements: 

we want them to do more, 

and we want them to run faster. 

Both of these factors improve when the processor does more things at once. 

We use the term concurrency to refer to the general concept of a system with multiple, simultaneous activities, 

and the term parallelism to refer to the use of concurrency to make a system run faster. 

Parallelism can be exploited at multiple levels of abstraction in a computer system. 

We highlight three levels here, 

working from the highest to the lowest level in the system hierarchy.

Thread-Level Concurrency

Building on the process abstraction, 

we are able to devise systems where multiple programs execute at the same time, 

leading to concurrency. 

With threads, we can even have multiple control flows executing within a single process. 

Support for concurrent execution has been found in computer systems since the advent of time-sharing in the early 1960s. 

Traditionally, this concurrent execution was only simulated, 

by having a single computer rapidly switch among its executing processes, 

much as a juggler keeps multiple balls flying through the air. 

This form of concurrency allows multiple users to interact with a system at the same time,

such as when many people want to get pages from a single Web server. 

It also allows a single user to engage in multiple tasks concurrently, 

such as having a Web browser in one window, a word processor in another, and streaming music playing at the same time. 

Until recently, most actual computing was done by a single processor, 

even if that processor had to switch among multiple tasks. 

This configuration is known as a uniprocessor system.

When we construct a system consisting of multiple processors all under the control of a single operating system kernel, 

we have a multiprocessor system.

Such systems have been available for large-scale computing since the 1980s, 

but they have more recently become commonplace with the advent of multi-core processors and hyperthreading. 

Figure 1.16 shows a taxonomy of these different processor types.

Multi-core processors have several CPUs (referred to as “cores”) integrated onto a single integrated-circuit chip. 

Figure 1.17 illustrates the organization of an Intel Core i7 processor, 

where the microprocessor chip has four CPU cores, each with its own L1 and L2 caches 

but sharing the higher levels of cache as well as the interface to main memory. 

Industry experts predict that they will be able to have dozens, and ultimately hundreds, of cores on a single chip.

Hyperthreading, sometimes called simultaneous multi-threading, 

is a tech- nique that allows a single CPU to execute multiple flows of control. 

It involves having multiple copies of some of the CPU hardware, 

such as program counters and register files, 

while having only single copies of other parts of the hardware,

such as the units that perform floating-point arithmetic. 

Whereas a conventional processor requires around 20,000 clock cycles to shift between different threads,

a hyperthreaded processor decides which of its threads to execute on a cycle- by-cycle basis. 

It enables the CPU to make better advantage of its processing resources. 

For example, if one thread must wait for some data to be loaded into a cache, 

the CPU can proceed with the execution of a different thread. 

As an ex- ample, the Intel Core i7 processor can have each core executing two threads, 

and so a four-core system can actually execute eight threads in parallel.

The use of multiprocessing can improve system performance in two ways.

First, it reduces the need to simulate concurrency when performing multiple tasks.

As mentioned, even a personal computer being used by a single person is expected to perform many activities concurrently. 

Second, it can run a single application program faster, 

but only if that program is expressed in terms of multiple threads that can effectively execute in parallel. 

Thus, although the principles of concurrency have been formulated and studied for over 50 years, 

the advent of multi-core and hyperthreaded systems has greatly increased the desire to find ways to write application programs 

that can exploit the thread-level parallelism available with the hardware. 

Chapter 12 will look much more deeply into concurrency and its use to provide a sharing of processing resources and to enable more parallelism
in program execution.


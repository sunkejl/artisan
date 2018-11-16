1.5 Caches Matter

An important lesson from this simple example is that a system spends a lot of time moving information from one place to another.

The machine instructions in the hello program are originally stored on disk.

When the program is loaded,they are copied to main memory.

As the processor runs the program,

instructions are copied from main memory into the processor.

Similarly, the data string “hello,world\n”,

originally on disk, is copied to main memory,

and then copied from main memory to the display device.

From a programmer’s perspective, much of this copying is overhead that slows down the “real work” of the program.

Thus,a major goal for system designers is to make these copy operations run as fast as possible.

Because of physical laws, larger storage devices are slower than smaller storage devices.

And faster devices are more expensive to build than their slower counterparts.

For example, the disk drive on a typical system might be 1000 times larger than the main memory,

but it might take the processor 10,000,000 times longer to read a word from disk than from memory.

Similarly, a typical register file stores only a few hundred bytes of information,

as opposed to billions of bytes in the main memory.

However,the processor can read data from the register file almost 100 times faster than from memory.

Even more troublesome, as semiconductor technology progresses over the years,

this processor-memory gap continues to increase.

It is easier and cheaper to make processors run faster than it is to make main memory run faster.

To deal with the processor-memory gap,

system designers include smaller faster storage devices called cache memories(or simply caches) that

serve  as temporary staging areas for information that the processor is likely to need in the near future.

Figure 1.8 shows the cache memories in a typical system.

An L1 cache on the processor chip holds tens of thousands of bytes and can be accessed nearly as fast as the register file.

A larger L2 cache with hundreds of thousands to millions of bytes is connected to the processor by a special bus.

It might take 5 times longer for the process to access the L2 cache than the L1 cache,

but this is still 5 to 10 times faster than accessing the main memory.

The L1 and L2 caches are implemented with a hardware technology known as static random access memory(SRAM).

Newer and more powerful systems even have three levels of cache: L1,L2, and L3.

The idea behind caching is that a system can get the effect of both a very large memory and a very fast one by exploiting locality,

the tendency for programs to access data and code in localized regions.

By setting up caches to hold data that is likely to be accessed often,

we can perform most memory operations using the fast caches.

One of the most important lessons in this book is that application programmers

who are aware of cache memories can exploit them to improve the performance of their programs by an order of magnitude.

You will learn more about these important devices and how to exploit them in Chapter 6.
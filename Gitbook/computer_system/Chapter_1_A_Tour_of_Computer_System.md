1. PC is also a commonly used acronym for “personal computer.” However, the distinction betweenthe two should be clear from the context.

1.4.2 Running the hello Program 
Given this simple view of a system’s hardware organization and operation, we canbegin to understand what happens when we run our example program. We mustomit a lot of details here that will be filled in later, but for now we will be contentwith the big picture.Initially, the shell program is executing its instructions, waiting for us to typea  command.  As  we  type  the  characters  “./hello”  at  the  keyboard,  the  shellprogram reads each one into a register, and then stores it in memory, as shown inFigure 1.5.When we hit theenterkey on the keyboard, the shell knows that we havefinished typing the command. The shell then loads the executablehellofile byexecuting a sequence of instructions that copies the code and data in thehelloobject file from disk to main memory. The data include the string of characters“hello, world\n” that will eventually be printed out.Using a technique known asdirect memory access(DMA, discussed in Chap-ter 6), the data travels directly from disk to main memory, without passing throughthe processor. This step is shown in Figure 1.6.Once the code and data in thehelloobject file are loaded into memory, theprocessor begins executing the machine-language instructions in thehellopro-gram’smainroutine. These instructions copy the bytes in the “hello, world\n”string from memory to the register file, and from there to the display device, wherethey are displayed on the screen. This step is shown in Figure 1.7.

1.5 Caches Matter
An important lesson from this simple example is that a system spends a lot oftime moving information from one place to another. The machine instructions inthehelloprogram are originally stored on disk. When the program is loaded,they are copied to main memory. As the processor runs the program,  instruc-tions are copied from main memory into the processor. Similarly, the data string“hello,world\n”, originally on disk, is copied to main memory, and then copiedfrom main memory to the display device. From a programmer’s perspective, muchof this copying is overhead that slows down the “real work” of the program. Thus,a major goal for system designers is to make these copy operations run as fast aspossible.Because of physical laws, larger storage devices are slower than smaller stor-age devices. And faster devices are more expensive to build than their slowercounterparts. For example, the disk drive on a typical system might be 1000 timeslarger than the main memory, but it might take the processor 10,000,000 timeslonger to read a word from disk than from memory.Similarly, a typical register file stores only a few hundred bytes of information,as opposed to billions of bytes in the main memory. However, the processor canread data from the register file almost 100 times faster than from memory. Evenmore troublesome, as semiconductor technology progresses over the years, thisprocessor-memory gapcontinues  to  increase.  It  is  easier  and  cheaper  to  makeprocessors run faster than it is to make main memory run faster.To  deal  with  the  processor-memory  gap,  system  designers  include  smallerfaster  storage  devices  calledcache memories(or  simply  caches)  that  serve  astemporary staging areas for information that the processor is likely to need inthe near future. Figure 1.8 shows the cache memories in a typical system. AnL1
cache on the processor chip holds tens of thousands of bytes and can be accessednearly as fast as the register file. A largerL2 cachewith hundreds of thousandsto millions of bytes is connected to the processor by a special bus. It might take 5times longer for the process to access the L2 cache than the L1 cache, but this isstill 5 to 10 times faster than accessing the main memory. The L1 and L2 caches areimplemented with a hardware technology known asstatic random access memory(SRAM). Newer and more powerful systems even have three levels of cache: L1,L2, and L3. The idea behind caching is that a system can get the effect of botha very large memory and a very fast one by exploitinglocality, the tendency forprograms to access data and code in localized regions. By setting up caches to holddata that is likely to be accessed often, we can perform most memory operationsusing the fast caches.One of the most important lessons in this book is that application program-mers who are aware of cache memories can exploit them to improve the perfor-mance of their programs by an order of magnitude. You will learn more aboutthese important devices and how to exploit them in Chapter 6.


1.6 Storage Devices Form a Hierarchy

This  notion  of  inserting  a  smaller,  faster  storage  device  (e.g.,  cache  memory)between the processor and a larger slower device (e.g., main memory) turns outto be a general idea. In fact, the storage devices in every computer system areorganized as amemory hierarchysimilar to Figure 1.9. As we move from the topof the hierarchy to the bottom, the devices become slower, larger, and less costlyper byte. The register file occupies the top level in the hierarchy, which is knownas level 0, or L0. We show three levels of caching L1 to L3, occupying memoryhierarchy levels 1 to 3. Main memory occupies level 4, and so on.The main idea of a memory hierarchy is that storage at one level serves as acache for storage at the next lower level. Thus, the register file is a cache for theL1 cache. Caches L1 and L2 are caches for L2 and L3, respectively. The L3 cacheis a cache for the main memory, which is a cache for the disk. On some networkedsystems with distributed file systems, the local disk serves as a cache for data storedon the disks of other systems.
Just as programmers can exploit knowledge of the different caches to improveperformance, programmers can exploit their understanding of the entire memoryhierarchy. Chapter 6 will have much more to say about this.






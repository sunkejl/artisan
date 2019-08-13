1.7.2
Threads

Although we normally think of a process as having a single control flow, 

in modern systems a process can actually consist of multiple execution units, 

called threads,

each running in the context of the process and sharing the same code and global data. 

Threads are an increasingly important programming model because of the
requirement for concurrency in network servers, 

because it is easier to share data between multiple threads than between multiple processes, 

and because threads are typically more efficient than processes. 

Multi-threading is also one way to make programs run faster when multiple processors are available, 

as we will discuss in Section 1.9.1. 

You will learn the basic concepts of concurrency, including how to write threaded programs, in Chapter 12.
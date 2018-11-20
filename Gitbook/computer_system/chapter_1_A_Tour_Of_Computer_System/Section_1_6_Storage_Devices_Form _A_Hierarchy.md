1.6 Storage Devices Form a Hierarchy

This notion of inserting a smaller, faster storage device (e.g.,cache memory) between the processor 

and a larger slower device (e.g., main memory) turns out to be a general idea. 

In fact, the storage devices in every computer system are organized as a memory hierarchy similar to Figure 1.9. 

As we move from the top of the hierarchy to the bottom, the devices become slower, larger, and less costly per byte. 

The register file occupies the top level in the hierarchy, which is known as level 0, or L0. 

We show three levels of caching L1 to L3, occupying memory hierarchy levels 1 to 3. 

Main memory occupies level 4, and so on.

The main idea of a memory hierarchy is that storage at one level serves as a cache for storage at the next lower level. 

Thus, the register file is a cache for the L1 cache. Caches L1 and L2 are caches for L2 and L3, respectively. 

The L3 cache is a cache for the main memory, which is a cache for the disk. 

On some net worked systems with distributed file systems, 

the local disk serves as a cache for data stored on the disks of other systems.

Just as programmers can exploit knowledge of the different caches to improve performance, 

programmers can exploit their understanding of the entire memory hierarchy. 

Chapter 6 will have much more to say about this.






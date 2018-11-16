

1.6 Storage Devices Form a Hierarchy

This  notion  of  inserting  a  smaller,  faster  storage  device  (e.g.,  cache  memory)between the processor and a larger slower device (e.g., main memory) turns outto be a general idea. In fact, the storage devices in every computer system areorganized as amemory hierarchysimilar to Figure 1.9. As we move from the topof the hierarchy to the bottom, the devices become slower, larger, and less costlyper byte. The register file occupies the top level in the hierarchy, which is knownas level 0, or L0. We show three levels of caching L1 to L3, occupying memoryhierarchy levels 1 to 3. Main memory occupies level 4, and so on.The main idea of a memory hierarchy is that storage at one level serves as acache for storage at the next lower level. Thus, the register file is a cache for theL1 cache. Caches L1 and L2 are caches for L2 and L3, respectively. The L3 cacheis a cache for the main memory, which is a cache for the disk. On some networkedsystems with distributed file systems, the local disk serves as a cache for data storedon the disks of other systems.
Just as programmers can exploit knowledge of the different caches to improveperformance, programmers can exploit their understanding of the entire memoryhierarchy. Chapter 6 will have much more to say about this.







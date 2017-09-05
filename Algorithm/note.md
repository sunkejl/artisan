####Characteristics of a Data Structure

Correctness − Data structure implementation should implement its interface correctly.

Time Complexity(复杂度) − Running time or the execution time of operations of data structure must be as small as possible.

Space Complexity − Memory usage of a data structure operation should be as little as possible.

* Worst Case
* Average Case 
* Best Case

####Basic Terminology

Data − Data are values or set of values.

Data Item − Data item refers to single unit of values.

Group Items − Data items that are divided into sub items are called as Group Items.

Elementary Items − Data items that cannot be divided are called as Elementary Items.

Attribute and Entity − An entity is that which contains certain attributes or properties, which may be assigned values.

Entity Set − Entities of similar attributes form an entity set.

Field − Field is a single elementary unit of information representing an attribute of an entity.

Record − Record is a collection of field values of a given entity.

File − File is a collection of records of the entities in a given entity set.

####categories(类别) of algorithms 

* Search − Algorithm to search an item in a data structure.
* Sort − Algorithm to sort items in a certain order.
* Insert − Algorithm to insert item in a data structure.
* Update − Algorithm to update an existing item in a data structure.
* Delete − Algorithm to delete an existing item from a data structure.

####time required 
* Best Case − Minimum time required for program execution.
* Average Case − Average time required for program execution.
* Worst Case − Maximum time required for program execution.


| | | | |
| --- | --- | --- |  ---|
|Ο | Notation | Oh | worst case |
|Ω | Notation | Omega | best case|
|θ | Notation  | Theta | |

####common asymptotic notations
* constant	−	Ο(1)
* logarithmic	−	Ο(logn)
* linear	−	Ο(n)
* n log n	−	Ο(nlogn)
* quadratic	−	Ο(n2)
* cubic	−	Ο(n3)
* polynomial(多项式)	−	nΟ1
* exponential(指数)	−	2Οn

####divide and conquer

Divide/Break
breaking the problem into smaller sub-problems.
takes a recursive approach to divide the problem until no sub-problem is further divisible. 

Conquer/Solve
receives a lot of smaller sub-problems to be solved. 

Merge/Combine
this stage recursively combines them until they formulate a solution of the original problem. 
This algorithmic approach works recursively and conquer & merge steps works so close that they appear as one.

Examples

The following computer algorithms are based on divide-and-conquer programming approach 
* Merge Sort
* Quick Sort
* Binary Search

####DATA STRUCTURES

Data Object represents an object having a data.

Data Type
* Built-in Data Type  (Integers Boolean{true,false} float{Decimal numbers} Strings)
* Derived(派生) Data Type (List Array Stack Queue)

Basic Operations
* Traversing(遍历)
* Searching
* Insertion
* Deletion
* Sorting
* Merging

Array
Array is a container which can hold a fix number of items and these items should be of the same type.
* Element  each item store in an array 
* Index numerical index  to identify the element 

type size name element index length

* basic operations
* travers
* insertion
* deletion
* search
* update

Linked List
A linked list is a sequence of data structures, which are connected together via links.
Each link contains a connection to another link.
Linked list is the second most-used data structure after array.

* Link − Each link of a linked list can store a data called an element.
* Next − Each link of a linked list contains a link to the next link called Next.
* LinkedList − A Linked List contains the connection link to the first link called First.

Types of Linked List
* Simple Linked List − Item navigation is forward only.
* Doubly Linked List − Items can be navigated forward and backward.
* Circular Linked List − Last item contains link of the first element as next and the first element has a link to the last element as previous.

Basic Operations
* Insertion − Adds an element at the beginning of the list.
* Deletion − Deletes an element at the beginning of the list.
* Display − Displays the complete list.
* Search − Searches an element using the given key.
* Delete − Deletes an element using the given key.

Doubly Linked List 
Link − Each link of a linked list can store a data called an element.
Next − Each link of a linked list contains a link to the next link called Next.
Prev − Each link of a linked list contains a link to the previous link called Prev.
LinkedList − A Linked List contains the connection link to the first link called First and to the last link called Last.

Singly Linked List as Circular
In singly linked list, the next pointer of the last node points to the first node.

Doubly Linked List as Circular
In doubly linked list, the next pointer of the last node points to the first node and the previous pointer of the first node points to the last node making the circular in both directions.


####A stack is an Abstract Data Type
 it behaves like a real-world stack
 
 last in first out
 A stack can be implemented by means of Array, Structure, Pointer, and Linked List. 
 Stack can either be a fixed size one or it may have a sense of dynamic resizing.
 
 频繁插入 删除 链表比数组有优势
 随机访问次数高于插入和删除操作 数组更有优势 因为数组元素在内存中是连续排序的 链表中访问元素 需要指向元素的指针
 
 basic operations
 push − Pushing storing an element on the stack.
 pop − Removing accessing an element from the stack.
 peek − get the top data element of the stack, without removing it.
 isFull − check if stack is full.
 isEmpty − check if stack is empty.
 
 Expression 
 Infix Notation 中缀 a+b
 Prefix (Polish) Notation 前缀 ++a
 Postfix (Reverse-Polish) Notation 后缀 b++
 
 利用栈 进行+ - * / 的计算 todo
 
 ####Queue
 Queue is an abstract data structure
 First-In-First-Out
 
 Basic Operations
 enqueue() − add (store) an item to the queue.
 dequeue() − remove (access) an item from the queue.
 peek() − Gets the element at the front of the queue without removing it.
 isfull() − Checks if the queue is full.
 isempty() − Checks if the queue is empty.
 
 ####Linear Search
  search  all items one by one
  
  
 #### Binary Search
 run-time complexity of Ο(log n)
 divide and conquer
 the data collection should be in the sorted form  数据需要排好顺序先
 mid = (high - low) / 2
 compare the value in mid with the value being searched
 midNext=(high - mid) / 2
 ...
 
 ####Hash Table
 Hash Table is a data structure which stores data in an associative manner
  stored in an array
  each data value has its own unique index value
  
  Hash Table uses an array as a storage medium 
  and 
  uses hash technique to generate an index
  
  hash 对数组的key 和hast table 的index进行转换
  
  Basic Operations
  Search − Searches an element in a hash table.
  Insert − inserts an element in a hash table.
  delete − Deletes an element from a hash table.
  
  #### Bubble Sort
   worst case complexity are of Ο(n2) 
   
 冒泡排序算法的运作如下：
 比较相邻的元素。如果第一个比第二个大，就交换他们两个。
 对每一对相邻元素作同样的工作，从开始第一对到结尾的最后一对。这步做完后，最后的元素会是最大的数。
 针对所有的元素重复以上的步骤，除了最后一个。
 持续每次对越来越少的元素重复上面的步骤，直到没有任何一对数字需要比较。
 
 ```php
 for ($i=0;$i<$len-1;$i++)
    for ($j=0;$j<$len-$i-1;$j++)
    if($arr[$j]>$arr[$j+1]){
        swap($arr[$j],$arr[$j+1])
    }
 ```
 
 
 
 
 
 
 
 
 
 
 








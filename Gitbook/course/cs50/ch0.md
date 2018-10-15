https://docs.cs50.net/2017/fall/notes/0/lecture0.html#introduction

Lecture 0
Introduction

And the course itself, as is the field of computer science, 
is less about strictly programming and more about problem solving.
As opposed to an end in itself, 
CS is a tool we can use to do more powerful and interesting things in any other field.

Binary

Computers use the binary system, with two digits
0 and 1, as opposed to humans, who typically use the decimal system, with 10 digits.

We can count in unary with our hands, by raising one finger for each number we count. So one hand can count up to five.

We can use the patterns of how our hands are raised to count higher. 
For example, just having our thumb extended could be 1, just our index finger could be 2, and both our thumb and index finger could be 3.
 Let’s take a closer look.

In decimal, 123 is one hundred and twenty-three, with each digit in a column:

|100|10|1|
|:---:|:---:|:---:|
| 1|2|3|
|100 x 1|10 x 2|1 x 3|


The rightmost number is in the 1s place, the next one is in the 10s place, 
and the leftmost one above is in the 100s place.

Binary represents numbers in the same pattern, but using powers of 2 instead of powers of 10 that decimal uses. The first row shows the value of each column, like the 100, 10, and 1 above, and the second row is our current binary number.

      4          2          1

      0          0          0
To represent a 1, we simply place a 1 in the ones column:

      4          2          1

      0          0          1

            1 x 1
And a 2 like so:

      4          2          1

      0          1          0

             2 x 1
And a 3 by combining the previous two steps:

      4          2          1

      0          1          1

             2 x 1      1 x 1
We can continue this pattern:

      4          2          1

      1          0          0

  4 x 1
      4          2          1

      1          0          1

  4 x 1                 1 x 1
      4          2          1

      1          1          0

  4 x 1      2 x 1
      4          2          1

      1          1          1

  4 x 1      2 x 1      1 x 1
But once we have used up all the places, we need more bits, or binary digit, which stores a 0 or 1.

It turns out that computers can conveniently represent a 0 or 1 with electricity,
since something can either be turned on or off. And computers have lots of transistors, microscopic switches inside, 
that can be turned on and off to represent data.

Now that we can store numbers, we need to represent words, or letters. 
Luckily, there is a standard mapping from numbers to letters, called ASCII.

We can also similarly use certain standards to represent graphics and videos.

A series of bits, that represent the numbers `72` `73` `33` might be the characters `H` `I` `!` in ASCII, 
but could also be interpreted by graphics programs as a color.

RGB, for example, is a system where a color is represented by the amount of red, green, and blue light it is composed of. 
By mixing the above amounts of red, green, and blue, we get a color like a murky yellow. A picture on a screen, 
then, can be represented by lots and lots of these pixels, or single squares of color.

For both ASCII and RGB, the maximum value that each character or amount of one color can be is 255
because one common standard group of bits is a byte, or 8 bits.

In computer science, a common theme is abstraction, where we start by taking ideas to solve simple problems
and layering these solutions until we can build more and more interesting applications.

Algorithms
Now that we know how to represent inputs and outputs, we can work on algorithms,
which is just step-by-step instructions on how to solve a problem.

Computational thinking is the idea of having these precise instructions.

In fact, when we write algorithms to solve problems, 
we need to think about cases when something unexpected happens. 
For example, the input might not be within the range of what we expect, 
so our computer might freeze or come up with an incorrect solution.

We can see this in action with trying to find a name in the phone book, Mike Smith.

One correct algorithm might be flipping through the phone book, page by page, until we find the person we are looking for.

Another algorithm could be flipping through two pages at a time,
but it’s no longer correct since we might skip our friend Mike.
We can fix this by adding another step, where if we notice we have passed our friend (since the phone book is alphabetized),
we go back a page and check.

We can also open the book to the middle, 
and find ourselves in the M section (by last name), 
and know that Mike Smith is in the right half of the book, and throw the left half away. 
We can repeat this again and again, and eventually have one page left to look at. 
With 1000 pages, it would only take about 10 steps of division to reach that one page.

We can consider how fast each of these algorithms are, with a chart like this:

graph of times to solve: n, n/2, log(n)
The size of the problem might be defined in this case as the number of pages in the phone book, or n.

So our first algorithm, going page by page, requires n steps to complete, since there are n pages.

The second algorithm, going two pages at a time, requires n/2 steps.

Our last algorithm is a different shape, with time to solve growing more and more slowly as the size of the problem increases, 
since we are dividing the problem in half with each step. So an increase from 1000 to 2000 pages only requires one more step to solve.

We also need to formalize the steps we are using to solve this problem.

Finally, go back creates loops, or series of steps that happen over and over, until we complete our algorithm.

1.7 The Operating System Manages the Hardware

Back to our hello example. 

When the shell loaded and ran the hello program,

and when the hello program printed its message, 

neither program accessed the keyboard, display, disk, or main memory directly. 

Rather, they relied on the services provided by the operating system. 

We can think of the operating system as a layer of software interposed between the application program and the hardware,

as shown in Figure 1.10. 

All attempts by an application program to manipulate the hardware must go through the operating system.

The operating system has two primary purposes: 

(1) to protect the hardware from misuse by runaway applications, and 

(2) to provide applications with simple and uniform mechanisms for manipulating complicated 
and often wildly different low-level hardware devices. 

The operating system achieves both goals via the fundamental abstractions shown in Figure 1.11: 
processes, virtual memory, and files. 

As this figure suggests, 

files are abstractions for I/O devices, 

virtual memory is an abstraction for both the main memory and disk I/O devices, 

and processes are abstractions for the processor, main memory, and I/O devices. 

We will discuss each in turn.

Aside

Unix and Posix

The 1960s was an era of huge, complex operating systems, 

such as IBM’s OS/360 and Honeywell’s
Multics systems. 

While OS/360 was one of the most successful software projects in history, 

Multics
dragged on for years and never achieved wide-scale use. 

Bell Laboratories was an original partner in the
Multics project, 

but dropped out in 1969 because of concern over the complexity of the project and the
lack of progress. 

In reaction to their unpleasant Multics experience, 

a group of Bell Labs researchers—
Ken Thompson, Dennis Ritchie, Doug McIlroy, and Joe Ossanna—began work in 1969 on a simpler
operating system for a DEC PDP-7 computer, 

written entirely in machine language. 

Many of the ideas
in the new system, such as the hierarchical file system and the notion of a shell as a user-level process,

were borrowed from Multics but implemented in a smaller, simpler package. 

In 1970, Brian Kernighan
dubbed the new system “Unix” as a pun on the complexity of “Multics.” 

The kernel was rewritten in
C in 1973, and Unix was announced to the outside world in 1974 [89].

Because Bell Labs made the source code available to schools with generous terms, 

Unix developed
a large following at universities. 

The most influential work was done at the University of California
at Berkeley in the late 1970s and early 1980s, 

with Berkeley researchers adding virtual memory and
the Internet protocols in a series of releases called Unix 4.xBSD (Berkeley Software Distribution).

Concurrently, Bell Labs was releasing their own versions, 

which became known as System V Unix.
Versions from other vendors, 

such as the Sun Micro systems Solaris system, were derived from these
original BSD and System V versions.

Trouble arose in the mid 1980s as Unix vendors tried to differentiate themselves by adding new
and often incompatible features. 

To combat this trend, IEEE (Institute for Electrical and Electronics
Engineers) sponsored an effort to standardize Unix, 

later dubbed “Posix” by Richard Stallman. 

The
result was a family of standards, known as the Posix standards, 

that cover such issues as the C language
interface for Unix system calls, 

shell programs and utilities, threads, and network programming. 

As
more systems comply more fully with the Posix standards, the differences between Unix versions are
gradually disappearing.
1.7.4
Files

A file is a sequence of bytes, nothing more and nothing less. 

Every I/O device, including disks, keyboards, displays, and even networks, 

is modeled as a file. 

All input and output in the system is performed by reading and writing files, 

using a small set of system calls known as Unix I/O.

This simple and elegant notion of a file is nonetheless very powerful 

because it provides applications with a uniform view of all of the varied I/O devices 

that might be contained in the system. 

For example, application programmers who manipulate the contents of a disk file are blissfully unaware of the specific disk
technology. 

Further, the same program will run on different systems that use different disk technologies. 

You will learn about Unix I/O in Chapter 10.


Aside
The Linux project

In August 1991, a Finnish graduate student named Linus Torvalds modestly announced a new Unix-like operating system kernel:
>From: torvalds@klaava.Helsinki.FI (Linus Benedict Torvalds)
Newsgroups: comp.os.minix
Subject: What would you like to see most in minix?
Summary: small poll for my new operating system
Date: 25 Aug 91 20:57:08 GMT
Hello everybody out there using minix
I’m doing a (free) operating system (just a hobby, won’t be big and
professional like gnu) for 386(486) AT clones. This has been brewing
since April, and is starting to get ready. I’d like any feedback on
things people like/dislike in minix, as my OS resembles it somewhat
(same physical layout of the file-system (due to practical reasons)
among other things).
I’ve currently ported bash(1.08) and gcc(1.40), and things seem to work.
This implies that I’ll get something practical within a few months, and
I’d like to know what features most people would want. Any suggestions
are welcome, but I won’t promise I’ll implement them :-)
Linus (torvalds@kruuna.helsinki.fi)

The rest, as they say, is history. 

Linux has evolved into a technical and cultural phenomenon. 

By combining forces with the GNU project, 

the Linux project has developed a complete, 

Posix-compliant version of the Unix operating system, 

including the kernel and all of the supporting infrastructure.

Linux is available on a wide array of computers, 

from hand-held devices to mainframe computers. 

A group at IBM has even ported Linux to a wristwatch!
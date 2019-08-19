1.8
Systems Communicate with Other Systems Using Networks

Up to this point in our tour of systems, 

we have treated a system as an isolated collection of hardware and software. 

In practice, modern systems are often linked to other systems by networks. 

From the point of view of an individual system, 

the network can be viewed as just another I/O device, as shown in Figure 1.14. 

When the system copies a sequence of bytes from main memory to the network adapter,

the data flows across the network to another machine, 

instead of, say, to a local disk drive. 

Similarly, the system can read data sent from other machines and copy this data to its main memory.

With the advent of global networks such as the Internet, 

copying information from one machine to another has become one of the most important uses of computer systems. 

For example, applications such as email, instant messaging, the World Wide Web, FTP, 
and telnet are all based on the ability to copy information over a network.

Returning to our hello example, we could use the familiar telnet application to run hello on a remote machine. 

Suppose we use a telnet client running on our local machine to connect to a telnet server on a remote machine. 

After we log in to the remote machine and run a shell, 

the remote shell is waiting to receive an input command. 

From this point, running the hello program remotely involves the five basic steps shown in Figure 1.15.

After we type the “hello” string to the telnet client and hit the enter key,
the client sends the string to the telnet server. 

After the telnet server receives the string from the network, 

it passes it along to the remote shell program. 

Next, the remote shell runs the hello program, 

and passes the output line back to the telnet server. 

Finally, the telnet server forwards the output string across the network to the telnet client, 

which prints the output string on our local terminal.

This type of exchange between clients and servers is typical of all network applications. 

In Chapter 11, you will learn how to build network applications, and apply this knowledge to build a simple Web server.
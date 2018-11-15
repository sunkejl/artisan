
Section 1.4  Processors Read and Interpret Instructions Stored in Memory

At this point, our hello.c source program has been translated by the compilation system into an executable object file called hello that is stored on disk. 

To run the executable file on a Unix system, 

we type its name to an application program known as a shell:

unix>./hello

hello, world

unix>

The shell is a command-line interpreter that prints a prompt, waits for you to type a command line, and then performs the command.

If the first word of the command line does not correspond to a built-in shell command, 

then the shell assumes that it is the name of an executable file that it should load and run. 

So in this case,the shell loads and runs the hello program and then waits for it to terminate. 

The hello program prints its message to the screen and then terminates. 

The shell then prints a prompt and waits for the next input command line.
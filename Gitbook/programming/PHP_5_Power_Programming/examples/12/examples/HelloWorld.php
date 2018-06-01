<?php

/**
 * Hello World class.  The ubiquitous example.
 * @package HelloWorld
 */
class HelloWorld
{
    function HelloWorld($html = true)
    {
        if ($html) {
            print "Hello, World!<br />\n";
        } else {
            print "Hello, World! \n";
        }
    }
}

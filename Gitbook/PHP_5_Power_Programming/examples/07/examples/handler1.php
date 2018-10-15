<?php

function my_exception_handler(Exception $e)
{
    print "Uncaught exception of type " . get_class($e) . ".. exiting\n";
    exit;
}

set_exception_handler("my_exception_handler");

throw new Exception;


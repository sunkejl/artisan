<?php

class Exception {
    public $message;
    function __construct($message) {
        $this->message = $message;
    }
}

try {
    will_fail();
} catch (Exception $e) {
    print "caught this exception: $e->message\n";
}

function will_fail() {
    // If you stay up at 4:45 writing you will make puns
    // like this one too!
    throw new Exception("will_fail failed, Will!");
}

?>
<?php

require_once 'PEAR.php';

if (PEAR::isError($e = lucky())) {
    die($e->getMessage() . "\n");
}

print "You were lucky, this time.\n";

function lucky() {
    if (rand(0, 1) == 0) {
        return PEAR::throwError('tough luck!');
    }
}

?>
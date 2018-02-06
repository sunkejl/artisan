<?php

require_once 'PEAR.php';

PEAR::setErrorHandling(PEAR_ERROR_EXCEPTION);

function foo() {
    bar();
}

function bar () {
    PEAR::raiseError("failing");
}

try {
    foo();
} catch (PEAR_Error $e) {
    printf("caught: %s\n", $e->getMessage());
    print "catch backtrace:\n";
    display_backtrace(debug_backtrace());
    print "PEAR_Error backtrace:\n";
    display_backtrace($e->getBacktrace());
}

function display_backtrace($bt) {
    foreach ($bt as $i => $f) {
        printf("#%d %s:%d: %s%s%s()\n", $i, basename($f['file']),
               $f['line'], $f['class'], $f['type'], $f['function']);
    }
}

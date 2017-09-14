<?php
try {
    throw new Exception("error", 1);
} catch (Exception $e) {
    $code = $e->getCode();
    $message = $e->getMessage();
    $line = $e->getLine();
    $file = $e->getFile();
    $trace = $e->getTrace();
    $traceAsString = $e->getTraceAsString();
}
var_dump(compact("code", "message", "line", "file", "trace", "traceAsString"));
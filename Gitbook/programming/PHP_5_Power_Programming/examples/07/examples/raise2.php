<?php

require_once 'PEAR.php';

class Luck extends PEAR
{
    function testLuck() {
        if (rand(0, 1) == 0) {
            return $this->throwError('tough luck!');
        }
        return "lucky!";
    }
}

$luck = new Luck;
$test = $luck->testLuck();
if (PEAR::isError($test)) {
    die($test->getMessage() . "\n");
}
print "$test\n";

?>
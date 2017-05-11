<?php
class Test
{
    private $str = "Say Hello";
    public function onAfter()
    {
        echo $this->str;     }
}

$test = new Test();
swoole_timer_after(1000, array($test, "onAfter"));

swoole_timer_after(2000, function() use($test){ 
   $test->onAfter(); });

<?php
/**不推荐 变量引用复制会造成运行混乱
 */
function foo(){
    var_dump($GLOBALS);
    var_dump($GLOBALS['name']);
    global $name;
    var_dump($name);
    $age=12;
    bar();
}
function bar(){
    global $age;
    var_dump($GLOBALS);
    var_dump($age);
}
$name="git";
$age=23;
foo();
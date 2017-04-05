<?php
/**不推荐 变量引用复制会造成运行混乱
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/24
 * Time: 17:53
 */
function foo(){
    var_dump($GLOBALS);
    var_dump($GLOBALS['name']);
    global $name;
    var_dump($name);
}
$name="git";
foo();
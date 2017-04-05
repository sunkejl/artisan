<?php
namespace b;
/**
 * 克隆对象   创建一个对象时 返回的值是一个指向对象的句柄 是对象的id号
o1是一个对象句柄 复制到o2也是一个句柄 改变o2时 也改变o1
要真的复制一个对象 $o2= clone $o1; 拷贝新的句柄给$o2
_clone在clone时调用
 * Class foo
 */
class foo{
	public $uid=1;
	function __construct(){
	}
} 
$o1=new foo;
$o2=$o1;
$o2->uid=3;
var_dump($o1->uid);
?>

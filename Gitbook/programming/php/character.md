# 特性

ord("a");#获取ASCII的数字
chr(97) 

PHP EOT定界符 

php5之前当把一个对象赋值给另一个对象时 PHP拷贝了那个对象 为了避免引擎赋值对象而使用&引用

php5中 除非clone来克隆对象 否则 永远不会无意识的复制对象

instanceof 是一的关系 判读对象是否属于某个类

Final 方法不能被重载 类 不能被继承

__clone 会在克隆的过程中调用

静态属性 最常用的是单列模式

function test(testClass $obj) 这种叫对象类型提示

实现了Iterator接口 在实现迭代接口后 可以用foreach遍历类的实例

function __autoload($className){
  include_once($className."php");
}

foreach 加上& 可以改变数组的值

注释3中方式
C方式  /*  */
C++方式 //
shell方式 #

isset($foo,$bar) 可以传多个值 

访问字符串中的字符 $str="abc"; $str{0}; {}用来区分字符串还是数组

资源类型 用来标识外部资源 一般无法直接接触 如数据库连接

数组是使用哈希表构造的 访问每个值有一个平均O（1）的复杂度

引用运算符& 当一个变量称为另一个变量的别名后，改变一个值也会改变另一个变量的值

字符串 也能用++ 递增方式为a-z "0"-"9"
字符串+1就会转换成数字类型 只能++

类型转换 (int) (float) (string) (bool) (array) (object)

switch 判断时用的是"=="

break;跳出最里面的循环 
continue;跳出当前 继续执行

include 警告
require 终止

include_once require_once 记住被包含过的文件

eval($str)  执行$str="$var=5;" 字符串里的代码

传递引用参数 function square(&$n){ $n=$n*$n} 外部的被传递的变量的值也会改变
引用 返回的不是变量的拷贝 而是变量的地址

OOP和面向功能 编程最大的区别是数据和代码绑定到一个实体里 这个实体叫做对象
面向对象的应用切割为许多对象 彼此交互

当new时 PHP会分派一个新的对象，并从你定义的类中拷贝属性和方法

静态属性 属于类本身而不属于任何实例  通常称为类属性 以便和对象或者实例的属性区别开
静态属性 存储在类中的全局变量 可以在任何地方通过类访问他们
static $var=0;内部self::$var 外部 MyClass::$var;访问静态属性
单列模式 使用静态变量

静态方法 不需要对象实例 只需要类的名字 可通过self:: parent::调用

全局的常量 通过define()函数定义   
类中的常量 通过const RED="red" 定义 和静态成员类似 属于类本身而不是类的实例 
const必须在最前面定义 define() 可以在函数中

访问也和静态成员类似 self::RED  或者 类名 来访问
常量定义后不能改变 不能注销 最常用的是定义枚举对象 

创建对象 返回的是对象句柄 就是对象的ID号  对象赋值也是赋值句柄  俩个指向同一个对象
$obj1=new MyClass(); $obj2=$obj1; $obj2->var=2; $obj1->var 也会被改变

克隆clone 赋值一个对象的拷贝  魔术方法__clone()创建新对象时会被调用



parent::__construct();

if($shape instanceof Rectangle)

__CLASS__ 存储当前类的名称

接口interface 总是public 不能给接口的函数原型设置访问修饰符

接口interface 可以多重继承 interface T extends T1,T2{}

final()方法 不能被重写
final()类   不能被继承

异常 用来处理问题 引来下一个规则
不要用异常来控制流程
至包含特定的错误信息

参数前提示类的类别 function t(MyClass $obj){} 
调用前 自动执行instanceof检查 满足和类的类别是一的关系的对象读合法

__get()
__set()
相关属性不存在时调用
__call()调用不存在方法是调用

__call($method,$args){
      $foo=new foo();
      return call_user_func_array([$foo,$method],$args);
}
可以从call里调用到一个不同的对象

implements ArrayAccess 实现这个接口可以像数组一样对对象进行操作


implements Iterator 对象的属性 用foreach()循环进行迭代遍历

enctype="multipart/form-data" 的时候 php://input 是无效的。
$input = file_get_contents("php://input");






























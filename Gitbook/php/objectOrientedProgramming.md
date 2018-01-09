oop
PHP5以上的版本，面向对象的功能基本上已经达到了Java C#的水平。
1、对象的传递全部采用传引用。

Php代码 
```php
$obj = new MClass;
```
可以把$obj任意传递到函数、对象、方法、属性，都是不会引起复制操作的，仍然是操作$obj本身。使用数据库类的操作，这一点非常好用，$db对象，可以被引用到任意的地方。模版引擎也可以，比如$smarty对象可以传递到任何地方。
通过is_object()函数可以判断是否是对象，或者是instanceof运算符，判断是否是某类。

Php代码 
```php

if(is_object($db))
if($obj instanceof MClass)
```
要想传递值，拷贝对象，使用clone关键字
```php

clone $obj;
```


2、private public protected 类的属性
final abstract 方法和属性的修饰符
static 静态方法和属性，可以使用self::methodName或者是MClass::methodName 来引用
如果这个类的方法中没有用到$this，这个方法没有声明为static，也可以认为是static的。
const 声明类常量，通过self::NAME或者是MClass::NAME来引用

3、继承关系
一个类可以继承一个父类，使用extends
```php
class A{}
class B extends A{}
```

B就是A的子类，继承了A所有的方法和属性。B在类中也可以覆盖父类的方法和属性。

4、接口interface
```php

interface iA
{
function setA()
{
}
}
interface iB extends iA
{
function setA()
{
}
}
```
声明了接口iA，和iB，iB继承了iA，接口可以继承多个父接口

class ATest implements iA{}
声明类ATest，类ATest加载了接口iA，所以类ATest必须实现iA接口的所有函数。

实例，如何通过数组访问方式来访问对象：
```php

class Test implements ArrayAccess
{
 var $_data = array();
 function offsetExists($keyname)
 {
 return array_key_exists($keyname,$this->_data);
 }
 function offsetGet($keyname)
 {
 return $this->_data[$keyname];
 }
 function offsetSet($keyname,$value)
 {
 $this->_data[$keyname] = $value;
 }
 function offsetUnset($keyname)
 {
 unset($this->_data[$keyname]);
 }
}
```
5、操作符和特殊方法

Php代码 
parent::  调用父类的方法和属性
self::    调用本类的方法和属性
$this->   调用对象的方法和属性
function __construct() 构造方法，生成对象时调用
function __toString()  转为字符串，用于echo $object。
function __destruct()  析构方法，销毁对象时调用
function __get()       $obj->name ，获取属性不存在时，调用这个方法。
function __set()       $obj->name = $value ，设置属性不存在时，调用这个方法。
function __call()      $obj->func()，调用对象的方法不存在时，调用这个方法。
function __clone()     clone $obj，复制对象时，调用这个方法。
6、function __autoload($class_name) 自动加载类文件
通过函数__autoload可以自动require或include类的.php文件。
有上述几个功能，PHP的面向对象其实已经非常灵活了。
PHP5.6将加入的名字空间和包，使PHP的面相对象特性更强。有点类似于脚本的C++了。


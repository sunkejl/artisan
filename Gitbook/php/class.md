Interfaces.

Gives the ability for a class to fulfill more than one is-a relationships. 
A class can inherit only from one class, but may implement as many interfaces as it wants:
一个类只能继承一个类，可以多个接口

```php
interface Display {
    function display();
}
class Circle implements Display {
    function display() {
        print "Displaying circle\n";
    }
}

```




Static methods.

You can now define methods as static by allowing them to be called from non-object context. 
Static methods do not define the $this variable because they are not bound to any specific object:
静态方法不属于任何对象 调用不用实例化

```class MyClass {
    static function helloWorld() {
        print "Hello, world";
    }
}
MyClass::helloWorld();php
```



Static members.

Class definitions can now include static members (properties) that are accessible via the class. 
Common usage of static members is in the Singleton pattern:
类的属性可以定义为static 通常用在单例模式

```php
class Singleton {
    static private $instance = NULL;

    private function __construct() {
    }

    static public function getInstance() {
        if (self::$instance == NULL) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}
```



Abstract classes.

A class may be declared abstract to prevent it from being instantiated. However, you may inherit from an abstract class:
抽象类不能被实例化，可以继承抽象类

```php
abstract class MyBaseClass {
    function display() {
        print "Default display routine being called";
    }
}

```



Abstract methods.

A method may be declared abstract, thereby deferring its definition to an inheriting class. A class that includes abstract methods must be declared abstract:
抽象方法 不能有大括号 只能定义
继承抽象类 的子类 必须实现其抽象方法
拥有抽象方法的类需要定义为抽象类

```php
abstract class MyBaseClass {
    abstract function display();
}

```



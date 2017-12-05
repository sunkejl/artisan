依赖注入可能是最简单的设计模式，也许平时都已经再用了，但是它可能是最难解释的.
可能是由于很多介绍它的例子没有意义，下面用php来解释

依赖注入只能在面向对象的世界才有意义，我们定义一个SessionStorage类来包装php session

```php
class SessionStorage
{
  function __construct($cookieName = 'PHP_SESS_ID')
  {
    session_name($cookieName);
    session_start();
  }

  function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  function get($key)
  {
    return $_SESSION[$key];
  }

  // ...
}
```
然后用user类提供更高的接口
```php
class User
{
  protected $storage;

  function __construct()
  {
    $this->storage = new SessionStorage();
  }

  function setLanguage($language)
  {
    $this->storage->set('language', $language);
  }

  function getLanguage()
  {
    return $this->storage->get('language');
  }

  // ...
}
```
这些类的定义和使用都很简单
```php
$user = new User();
$user->setLanguage('fr');
$user_language = $user->getLanguage();
```
这些都很好知道我们需要更多的灵活(flexibility),当我们需要为实例改变session的cookie名称

硬编码Hard Code名称在SessionStorage的初始化时
```php
   class User
    {
      function __construct()
      {
        $this->storage = new SessionStorage('SESSION_ID');
      }

      // ...
    }
```
在User类外面定义一个常量
```php
    class User
    {
      function __construct()
      {
        $this->storage = new SessionStorage(STORAGE_SESSION_NAME);
      }

      // ...
    }

    define('STORAGE_SESSION_NAME', 'SESSION_ID');
```
在User初始化是传递个参数
```php
    class User
    {
      function __construct($sessionName)
      {
        $this->storage = new SessionStorage($sessionName);
      }

      // ...
    }

    $user = new User('SESSION_ID');
```
添加一个数组作为配置
```php
    class User
    {
      function __construct($storageOptions)
      {
        $this->storage = new SessionStorage($storageOptions['session_name']);
      }

      // ...
    }

    $user = new User(array('session_name' => 'SESSION_ID'));
```
所有这些选项不好
在User类中硬编码名字没有真正解决问题，再下次修改时还需要再修改User类
用常量同样不好，User类会依赖常量设置
传递变量或者配置数组可能是好的方案，但这个参数和User类本身没有关系

还有一个问题没有被解决，如何改变SessionStorage类，目前的代码只有修改User类

使用依赖注入 不在User类中创建对象，把对象当成初始化参数如入给User类
```php
class User
{
  function __construct($storage)
  {
    $this->storage = $storage;
  }

  // ...
}
$storage = new SessionStorage('SESSION_ID');
$user = new User($storage);
```
配置存储对象现在很简单，直接替换session类,任何改变都不需要改变User类

依赖注入如同零件(components),在初始化时传入

依赖注入 并不限定在初始化时注入

初始化注入
```php
    class User
    {
      function __construct($storage)
      {
        $this->storage = $storage;
      }

      // ...
    }
```
setter注入
```php
    class User
    {
      function setSessionStorage($storage)
      {
        $this->storage = $storage;
      }

      // ...
    }
```
属性(property)注入
```php
    class User
    {
      public $sessionStorage;
    }

    $user->sessionStorage = $storage;
```
初始化注入是最好的

大部分框架使用一览注入提供高内聚(cohesive)，低耦合(decoupled)的组件


http://fabien.potencier.org/what-is-dependency-injection.html

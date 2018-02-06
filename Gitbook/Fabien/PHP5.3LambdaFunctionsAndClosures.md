php5.3有很多特征(features),其中最重要的是支持匿名函数(lambda functions拉姆达)和闭包,
匿名函数就是变量存储了一个匿名php方法，可以作为参数传递给别的方法或者函数.
闭包就是匿名函数

匿名函数 可以作为原生php 方法的参数 array_map(), array_reduce(), array_filter()
```php
$input = array(1, 2, 3, 4, 5);
$output = array_filter($input, function ($v) { return $v > 2; });
//
$output == array(2 => 3, 3 => 4, 4 => 5)
```
匿名函数可以赋值给变量进行重用
```php
$max_comparator = function ($v) { return $v > 2; };

$input = array(1, 2, 3, 4, 5);
$output = array_filter($input, $max_comparator);
```
如何把比较的值作为参数？可以再加一层闭包
```php
$max_comparator = function ($max)
{
  return function ($v) use ($max) { return $v > $max; };
};

$input = array(1, 2, 3, 4, 5);
$output = array_filter($input, $max_comparator(2));
```
匿名函数使用得当可以简化代码

依赖注入容器需要管理俩种不同的数据 对象和参数
对象在首次访问时被创建

使用__get(）和__set()模式方法，我们可以很容易管理对象和参数
```php
class DIContainer
{
  protected $values = array();

  function __set($id, $value)
  {
    $this->values[$id] = $value;
  }

  function __get($id)
  {
    return is_callable($this->values[$id]) ? $this->values[$id]($this) : $this->values[$id];
  }
}
$container = new DIContainer();

// define the parameters
$container->cookie_name = 'SESSION_ID';
$container->storage_class = 'SessionStorage';

// defined the objects
$container->storage = function ($c)
{
  return new $c->storage_class($c->cookie_name);
};
$container->user = function ($c)
{
  return new User($c->storage);
};

// get the user object
$user = $container->user;

// the above call is roughly equivalent to the following code:
// $storage = new SessionStorage('SESSION_ID');
// $user = new User($storage);
```

由匿名函数返回对象的实例

__get()方法检查所访问的值是对象还是参数，匿名函数是回调函数

目前实例存在被重复创建的可能 在赋值时加入判断
```php
$container->user = function ($c)
{
  static $object;

  if (is_null($object))
  {
    $object = new User($c->storage);
  }

  return $object;
};
```
函数中静态变量，避免重复赋值,随后的所有调用,相同的实例会被返回

现在的代码有点重复和易错,所有的实例都应该唯一

在赋值前，再封装一次匿名函数，增加调用逻辑判断唯一性
```php
class DIContainer
{
  // ...

  function asShared($callable)
  {
    return function ($c) use ($callable)
    {
      static $object;

      if (is_null($object))
      {
        $object = $callable($c);
      }

      return $object;
    };
  }
}

$c->user = $c->asShared(function ($c)
{
  return new User($c->storage);
});
```

http://fabien.potencier.org/on-php-5-3-lambda-functions-and-closures.html



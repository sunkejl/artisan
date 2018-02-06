大部分情况不需要依赖注入容易
但是当我们需要管理很多不同实例，这些实例有很多依赖，
这时依赖注入容易就会很有帮助，框架就是这么来管理实例的
在创造对象时，我们需要知道所有对象的依赖关系
```php
$transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', array(
  'auth'     => 'login',
  'username' => 'foo',
  'password' => 'bar',
  'ssl'      => 'ssl',
  'port'     => 465,
));

$mailer = new Zend_Mail();
$mailer->setDefaultTransport($transport);
```
依赖注入容器是一个对象知道如何实例化和配置对象，他需要知道初始化参数和对象之间的关系

下面是硬编码的容器
```php
class Container
{
  public function getMailTransport()
  {
    return new Zend_Mail_Transport_Smtp('smtp.gmail.com', array(
      'auth'     => 'login',
      'username' => 'foo',
      'password' => 'bar',
      'ssl'      => 'ssl',
      'port'     => 465,
    ));
  }

  public function getMailer()
  {
    $mailer = new Zend_Mail();
    $mailer->setDefaultTransport($this->getMailTransport());

    return $mailer;
  }
}

$container = new Container();
$mailer = $container->getMailer();
```

需要创造的实例的关系都嵌入在容器中,依赖关系由容器自动注入
容器内的配置都是硬编码，我们需要给容器传递一些参数
```php
class Container
{
  protected $parameters = array();

  public function __construct(array $parameters = array())
  {
    $this->parameters = $parameters;
  }

  public function getMailTransport()
  {
    return new Zend_Mail_Transport_Smtp('smtp.gmail.com', array(
      'auth'     => 'login',
      'username' => $this->parameters['mailer.username'],
      'password' => $this->parameters['mailer.password'],
      'ssl'      => 'ssl',
      'port'     => 465,
    ));
  }

  public function getMailer()
  {
    $mailer = new Zend_Mail();
    $mailer->setDefaultTransport($this->getMailTransport());

    return $mailer;
  }
}

$container = new Container(array(
  'mailer.username' => 'foo',
  'mailer.password' => 'bar',
));
$mailer = $container->getMailer();
```
mailer类也可以做为参数进行传递
```php
class Container
{
  // ...

  public function getMailer()
  {
    $class = $this->parameters['mailer.class'];

    $mailer = new $class();
    $mailer->setDefaultTransport($this->getMailTransport());

    return $mailer;
  }
}

$container = new Container(array(
  'mailer.username' => 'foo',
  'mailer.password' => 'bar',
  'mailer.class'    => 'Zend_Mail',
));
$mailer = $container->getMailer();
```
不需要每次都实例化，容器每次都返回相同的对象
```php
class Container
{
  static protected $shared = array();

  // ...

  public function getMailer()
  {
    if (isset(self::$shared['mailer']))
    {
      return self::$shared['mailer'];
    }

    $class = $this->parameters['mailer.class'];

    $mailer = new $class();
    $mailer->setDefaultTransport($this->getMailTransport());

    return self::$shared['mailer'] = $mailer;
  }
}
```
由于静态变量$shared的存在,每次返回的实例都是第一次创建的
依赖注入容器管理对象，从它们的初始化到配置，这些对象不知道他们被容器管理，
当然，手动创建维护容器更快,可继承的容器更有用

Pimple 容器
https://github.com/fabpot/Pimple

http://fabien.potencier.org/do-you-need-a-dependency-injection-container.html

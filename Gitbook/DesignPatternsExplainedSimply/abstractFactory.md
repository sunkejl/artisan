intent
provide an interface for creating families of related or dependent objects without specifying their concrete classes;
a hierarchy that encapsulates:many possible platforms,and the construction of a suite of products.
the new operator considered harmful

problem
if an application is to be portable ,it needs to encapsulate platform dependencies.
these platforms might include:windowing system,operating system,databases,etc.
too often,this encapsulation is not engineered in advance,
and lots of if case statements with options  for all currently supported platforms
begin to procreate like rabbits throughout the code.

Discussion
Provide a level of indirection that abstracts the creation of families of related or dependent objects without directly specifying their concrete classes. 
The "factory" object has the responsibility for providing creation services for the entire platform family. 
Clients never create platform objects directly, they ask the factory to do that for them.

This mechanism makes exchanging product families easy 
because the specific class of the factory object appears only once in the application - where it is instantiated. 

The application can wholesale replace the entire family of products simply by instantiating a different concrete instance of the abstract factory.

Because the service provided by the factory object is so pervasive, it is routinely implemented as a Singleton.

Structure
The Abstract Factory defines a Factory Method per product. 
Each Factory Method encapsulates the new operator and the concrete, platform-specific, product classes. 
Each "platform" is then modeled with a Factory derived class.

Check list
Decide if "platform independence" and creation services are the current source of pain.
Map out a matrix of "platforms" versus "products".
Define a factory interface that consists of a factory method per product.
Define a factory derived class for each platform that encapsulates all references to the new operator.
The client should retire all references to new, and use the factory methods to create the product objects.

Rules of thumb
Sometimes creational patterns are competitors: there are cases when either Prototype or Abstract Factory could be used profitably. 
At other times they are complementary: 
Abstract Factory might store a set of Prototypes from which to clone and return product objects, 
Builder can use one of the other patterns to implement which components get built. 
Abstract Factory, Builder, and Prototype can use Singleton in their implementation.
Abstract Factory, Builder, and Prototype define a factory object that's responsible for knowing and creating the class of product objects, 
and make it a parameter of the system. 
Abstract Factory has the factory object producing objects of several classes. 
Builder has the factory object building a complex product incrementally using a correspondingly complex protocol. 
Prototype has the factory object (aka prototype) building a product by copying a prototype object.
Abstract Factory classes are often implemented with Factory Methods, but they can also be implemented using Prototype.
Abstract Factory can be used as an alternative to Facade to hide platform-specific classes.
Builder focuses on constructing a complex object step by step. 
Abstract Factory emphasizes a family of product objects (either simple or complex). 
Builder returns the product as a final step, but as far as the Abstract Factory is concerned, the product gets returned immediately.
Often, designs start out using Factory Method (less complicated, more customizable, subclasses proliferate) 
and evolve toward Abstract Factory, Prototype, or Builder (more flexible, more complex) as the designer discovers where more flexibility is needed.



```php
<?php
/*
 *  Abstract Factory classes
 */

abstract class DB_Abstraction_Factory {
    protected $settings = array();
    protected function __construct() {
        $this->settings = Settings::getInstance();
    }
 
    abstract public function createInstance();
}
 
class DB_Abstraction_Factory_ADODB extends DB_Abstraction_Factory {
    public function __construct() {
        parent::__construct();
    }
    public function createInstance() {
        require_once('/path/to/adodb_lite/adodb.inc.php');
        $dsn = $this->settings['db.dsn'];
        $db = ADONewConnection($dsn);
        return $db;
    }
}
 
class DB_Abstraction_Factory_MDB2 extends DB_Abstraction_Factory {
    public function __construct() {
        parent::__construct();
    }
    public function createInstance() {
        require_once 'MDB2.php';
        $dsn = $this->settings['db.dsn'];
        $db = MDB2::factory($dsn);
        return $db;
    }
}

class DB_Abstraction_AbstractFactory {
    public static function getFactory() {
        $settings = Settings::getInstance();
        switch($settings['db.library'])
        {
            case 'adodblite':
                $factory = new DB_Abstraction_Factory_ADODBLITE();
            break;
            case 'mdb2';
                $factory = new DB_Abstraction_Factory_MDB2();
            break;
        }
        return $factory;
    }
 }

/*
 *  Client's code
 */

// instantiate Abstract Factory
$abstractfactory = new DB_Abstraction_AbstractFactory();
 
// fetch a concrete Factory (decision handled in Abstract Factory static method)
$factory = $abstractfactory::getFactory();
 
// use concrete Factory to create a database connection object from
// the selected database abstraction library
$db = $factory->createInstance();
```



In the Abstract Factory Pattern, 
an abstract factory defines what objects the non-abstract or concrete factory will need to be able to create.

The concrete factory must create the correct objects for it's context, 
insuring that all objects created by the concrete factory have been chosen to be able to work correctly for a given circumstance.

In this example we have 
an abstract factory, AbstractBookFactory, that specifies two classes,  AbstractPHPBook and AbstractMySQLBook, 
which will need to be created by the concrete factory.

The concrete class OReillyBookfactory extends AbstractBookFactory, and can create the  OReillyMySQLBook and OReillyPHPBook classes,
which are the correct classes for the context of  OReilly.

```php
<?php

/*
 * BookFactory classes
 */
abstract class AbstractBookFactory {
    abstract function makePHPBook();
    abstract function makeMySQLBook();
}

class OReillyBookFactory extends AbstractBookFactory {
    private $context = "OReilly";
    function makePHPBook() {
        return new OReillyPHPBook;
    }
    function makeMySQLBook() {
        return new OReillyMySQLBook;
    }
}

class SamsBookFactory extends AbstractBookFactory {
    private $context = "Sams";
    function makePHPBook() {
        return new SamsPHPBook;
    }
    function makeMySQLBook() {
        return new SamsMySQLBook;
    }
}

/*
 *   Book classes
 */
abstract class AbstractBook {
    abstract function getAuthor();
    abstract function getTitle();
}

abstract class AbstractMySQLBook extends AbstractBook {
    private $subject = "MySQL";
}

class OReillyMySQLBook extends AbstractMySQLBook {
    private $author;
    private $title;
    function __construct() {
        $this->author = 'George Reese, Randy Jay Yarger, and Tim King';
        $this->title = 'Managing and Using MySQL';
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
}

class SamsMySQLBook extends AbstractMySQLBook {
    private $author;
    private $title;
    function __construct() {
        $this->author = 'Paul Dubois';
        $this->title = 'MySQL, 3rd Edition';
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
}

abstract class AbstractPHPBook extends AbstractBook {
    private $subject = "PHP";
}

class OReillyPHPBook extends AbstractPHPBook {
    private $author;
    private $title;
    private static $oddOrEven = 'odd';
    function __construct()
    {
        //alternate between 2 books
        if ('odd' == self::$oddOrEven) {
            $this->author = 'Rasmus Lerdorf and Kevin Tatroe';
            $this->title = 'Programming PHP';
            self::$oddOrEven = 'even';
        }
        else {
            $this->author = 'David Sklar and Adam Trachtenberg';
            $this->title = 'PHP Cookbook';
            self::$oddOrEven = 'odd';
        }
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
}

class SamsPHPBook extends AbstractPHPBook {
    private $author;
    private $title;
    function __construct() {
        //alternate randomly between 2 books
        mt_srand((double)microtime() * 10000000);
        $rand_num = mt_rand(0, 1);

        if (1 > $rand_num) {
            $this->author = 'George Schlossnagle';
            $this->title = 'Advanced PHP Programming';
        }
        else {
            $this->author = 'Christian Wenz';
            $this->title = 'PHP Phrasebook';
        }
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
}

/*
 *   Initialization
 */

  writeln('BEGIN TESTING ABSTRACT FACTORY PATTERN');
  writeln('');

  writeln('testing OReillyBookFactory');
  $bookFactoryInstance = new OReillyBookFactory;
  testConcreteFactory($bookFactoryInstance);
  writeln('');

  writeln('testing SamsBookFactory');
  $bookFactoryInstance = new SamsBookFactory;
  testConcreteFactory($bookFactoryInstance);

  writeln("END TESTING ABSTRACT FACTORY PATTERN");
  writeln('');

  function testConcreteFactory($bookFactoryInstance)
  {
      $phpBookOne = $bookFactoryInstance->makePHPBook();
      writeln('first php Author: '.$phpBookOne->getAuthor());
      writeln('first php Title: '.$phpBookOne->getTitle());

      $phpBookTwo = $bookFactoryInstance->makePHPBook();
      writeln('second php Author: '.$phpBookTwo->getAuthor());
      writeln('second php Title: '.$phpBookTwo->getTitle());

      $mySqlBook = $bookFactoryInstance->makeMySQLBook();
      writeln('MySQL Author: '.$mySqlBook->getAuthor());
      writeln('MySQL Title: '.$mySqlBook->getTitle());
  }

  function writeln($line_in) {
    echo $line_in."<br/>";
  }

?>
```

“不同工厂生产出的产品实例之间是不接触的，这个是考客户端来封装实现的”。
一个射击学员刚入门，听到射击老师说射击的几个要素: 武器，子弹，武器装载子弹，武器打出子弹。
这个学员跃跃欲试，就跑到Ak47工厂买了枪，然后跑到沙漠之鹰工厂买了子弹，AK47装载沙鹰子弹，然后打出。学员卒。
老师听说后，为了避免这个悲剧发生，承包了武器和子弹购买，
要用AK47就必须在AK47工厂购买AK47和AK47子弹，
保证了AK47加载沙漠之鹰子弹这样的悲剧发生了。
这就是客户端加载工厂实例后，保证只使用这个工厂的生产的产品和产品之间的关系，确保不和其他工厂的产品实例进行接触。



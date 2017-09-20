This article is part of a series of articles that explains how to create a framework with the Symfony Components. It is OBSOLETE\(过时\) but an up-to-date version can be found in the Symfony documentation.

这篇文章是一个用来解释怎么用symfony 组件创建一个框架，最新的版本可以在symfony 文档中找到

Symfony2 is a reusable\(可重复使用\) set of standalone\(独立\), decoupled\(解耦\), and cohesive\(粘性\) PHP components that solve common\(共同\) web development problems.

symfony 是一个 独立 解耦 组件 用来解决网页开发的共同问题

Instead of using these low-level components, you can use the ready-to-be-used Symfony2 full-stack\(堆栈\) web framework, which is based on these components... or you can create your very own framework. This series is about the latter.

If you just want to use the Symfony2 full-stack framework, you'd better read its official documentation instead.

建议阅读官方文档

### Why would you like to create your own framework?

Why would you like to create your own framework in the first place? If you look around, everybody will tell you that it's a bad thing to reinvent\(重塑\) the wheel and that you'd better choose an existing framework and forget about creating your own altogether. Most of the time, they are right but I can think of a few good reasons to start creating your own framework:

普遍不建议重复造轮子，自己创建框架也是有好处的

To learn more about the low-level architecture\(建筑\) of modern web frameworks in general and about the Symfony2 full-stack framework internals\(内部\) in particular\(特定\);

了解symfony内部

To create a framework tailored\(量身定做\) to your very specific needs \(just be sure first that your needs are really specific\);

创建复合自身需求的框架

To experiment\(实验\) creating a framework for fun \(in a learn-and-throw-away approach\(方法\)\);

做一个框架为了学习

To refactor\(重构\) an old/existing application that needs a good dose of recent web development best practices;

重构时最好的练习

To prove the world that you can actually create a framework on your own \(... but with little effort\).

证明自己能写框架

I will gently guide you through the creation of a web framework, one step at a time. At each step, you will have a fully-working framework that you can use as is or as a start for your very own. We will start with simple frameworks and more features will be added with time. Eventually, you will have a fully-featured full-stack web framework.

将引导你创建框架 每一次加一点新功能

And of course, each step will be the occasion to learn more about some of the Symfony2 Components.

每一次 有机会学习symfony组件

If you don't have time to read the whole series, or if you want to get started fast, you can also have a look at Silex, a micro-framework based on the Symfony2 Components. The code is rather slim and it leverages manny aspects of the Symfony2 Components.

如果你没时间阅读整个章节 可以看下silex框架

Many modern web frameworks call themselves MVC frameworks. We won't talk about MVC here as the Symfony2 Components are able to create any type of frameworks, not just the ones that follow the MVC architecture. Anyway, if you have a look at the MVC semantics, this series is about how to create the Controller part of a framework. For the Model and the View, it really depends on your personal taste and I will let you use any existing third-party libraries \(Doctrine, Propel, or plain-old PDO for the Model; PHP or Twig for the View\).

很多框架自称MVC，Model 和view 可以由第三方组件 Doctrine Twig

When creating a framework, following the MVC pattern is not the right goal. The main goal should be the Separation of Concerns; I actually think that this is the only design pattern that you should really care about. The fundamental principles of the Symfony2 Components are centered around the HTTP specification. As such, the frameworks that we are going to create should be more accurately labelled as HTTP frameworks or Request/Response frameworks.

设计模式才是真正关心的  基本原则 是围绕http说明    创建的框架就是一个http 请求的响应的框架

Before we start  
Reading about how to create a framework is not enough. You will have to follow along and actually type all the examples we will work on. For that, you need a recent version of PHP \(5.3.8 or later is good enough\), a web server \(like Apache or NGinx\), a good knowledge of PHP and an understanding of Object Oriented programming.

Ready to go? Let's start.

Bootstrapping  
Before we can even think of creating our first framework, we need to talk about some conventions: where we will store our code, how we will name our classes, how we will reference external dependencies, etc.

To store our framework, create a directory somewhere on your machine:

```
$ mkdir framework
$ cd framework
```

Coding Standards  
Before anyone starts a flame war about coding standards and why the one used here suck hard, let's all admit that this does not matter that much as long as you are consistent. For this book, we are going to use the Symfony2 Coding Standards.

Components Installation  
To install the Symfony2 Components that we need for our framework, we are going to use Composer, a project dependency manager for PHP. First, list your dependencies in a composer.json file:

```
{
    "require": {
        "symfony/class-loader": "2.1.*"
    }
}
```

Here, we tell Composer that our project depends on the Symfony2 ClassLoader component, version 2.1.0 or later. To actually install the project dependencies, download the composer binary and run it:

下载composer二进制包 运行

```
$ wget http://getcomposer.org/composer.phar
$ # or
$ curl -O http://getcomposer.org/composer.phar

$ php composer.phar install
```

After running the install command, you must see a new vendor directory that must contain the Symfony2 ClassLoader code.

Even if we highly recommend you the use of Composer, you can also download the archives of the components directly or use Git submodules. That's really up to you.

Naming Conventions and Autoloading  
We are going to autoload all our classes. Without autoloading, you need to require the file where a class is defined before being able to use it. But with some conventions, we can just let PHP do the hard work for us.

没有autoloading 在类定义前 我们需要require这个文件   有了autoloading 我们可以让php 替我们自动加载

Symfony2 follows the de-facto PHP standard, PSR-0, for class names and autoloading. The Symfony2 ClassLoader Component provides an autoloader that implements this PSR-0 standard and most of the time, the Symfony2 ClassLoader is all you need to autoload all your project classes.

Create and empty autoloader in a new autoload.php file:

```
<?php

// framework/autoload.php

require_once __DIR__.'/vendor/symfony/class-loader/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->register();
```

You can now run the autoload.php on the CLI, it should not do anything and should not throw any error:

```
$ php autoload.php
```

The Symfony website has more information about the ClassLoader component.

Composer automatically creates an autoloader for all your installed dependencies; instead of using the ClassLoader component, you can also just require vendor/.composer/autoload.php.

composer 自动创建了自动加载   我们只需 require vendor/.composer/autoload.php

Our Project  
Instead of creating our framework from scratch\(草稿\), we are going to write the same "application" over and over again, adding one abstraction at a time. Let's start with the simplest web application we can think of in PHP:

```
<?php

$input = $_GET['name'];

printf('Hello %s', $_GET['name']);
```

That's all for the first part of this series. Next time, we will introduce the HttpFoundation Component and see what it brings us.

下一个系列 介绍HttpFoundation Component


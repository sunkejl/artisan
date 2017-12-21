Before we dive into the code refactoring\(重构\), I first want to step back and take a look at why you would like to use a framework instead of keeping your plain-old PHP applications as is. Why using a framework is actually a good idea, even for the simplest snippet\(片段\) of code and why creating your framework on top of the Symfony2 components is better than creating a framework from scratch\(草稿\).

I won't talk about the obvious and traditional\(传统\) benefits of using a framework when working on big applications with more than a few developers; the Internet has already plenty of good resources on that topic.

网上有很多框架的优点 这里就不讨论明显和传统的好处了

Even if the "application" we wrote yesterday was simple enough, it suffers from a few problems:

```
<?php

// framework/index.php

$input = $_GET['name'];

printf('Hello %s', $input);
```

First, if the name query parameter is not given in the URL query string, you will get a PHP warning; so let's fix it:

```
<?php

// framework/index.php

$input = isset($_GET['name']) ? $_GET['name'] : 'World';

printf('Hello %s', $input);
```

Then, this application is not secure安全. Can you believe it? Even this simple snippet of PHP code is vulnerable to one of the most widespread\(广泛\) Internet security issue, XSS \(Cross-Site Scripting\). Here is a more secure version:

无法抵御xss

```
<?php

$input = isset($_GET['name']) ? $_GET['name'] : 'World';

header('Content-Type: text/html; charset=utf-8');

printf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8'));
```

As you might have noticed, securing your code with htmlspecialchars is tedious\(枯燥\) and error prone. That's one of the reasons why using a template engine like Twig, where auto-escaping is enabled by default, might be a good idea \(and explicit escaping is also less painful \(费力\) with the usage of a simple filter\).

Twig把你从枯燥 费力中解脱出来

As you can see for yourself, the simple code we had written first is not that simple anymore if we want to avoid\(避免\) PHP warnings/notices and make the code more secure.

Beyond security, this code is not even easily testable. Even if there is not much to test, it strikes me that writing unit tests for the simplest possible snippet of PHP code is not natural and feels ugly. Here is a tentative PHPUnit unit test for the above code:

上面的代码不方便测试

```
<?php

// framework/test.php

class IndexTest extends \PHPUnit_Framework_TestCase
{
    public function testHello()
    {
        $_GET['name'] = 'Fabien';

        ob_start();
        include 'index.php';
        $content = ob_get_clean();

        $this->assertEquals('Hello Fabien', $content);
    }
}
```

If our application were just slightly bigger, we would have been able to find even more problems. If you are curious\(好奇\)  about them, read the Symfony2 versus Flat PHP chapter of the Symfony2 documentation.

随着项目变大 会出现更多的问题

At this point, if you are not convinced\(确信\) that security and testing are indeed two very good reasons to stop writing code the old way and adopt（采纳） a framework instead \(whatever adopting a framework means in this context\(上下文\)\), you can stop reading this series now and go back to whatever code you were working on before.

Of course, using a framework should give you more than just security and testability, but the more important thing to keep in mind is that the framework you choose must allow you to write better code faster.

框架可以解决 安全 和测试 还能让开发速度更快

Going OOP with the HttpFoundation Component

Writing web code is about interacting\(相互作用\) with HTTP. So, the fundamental principles \(基本原则\) of our framework should be centered around the HTTP specification\(说明\).

web开发围绕HTTP

The HTTP specification describes how a client \(a browser for instance（例子）\) interacts\(作用\) with a server \(our application via a web server\). The dialog\(会话\) between the client and the server is specified\(指定\) by well-defined messages, requests and responses: the client sends a request to the server and based on this request, the server returns a response.

客户端 和 服务端的会话 基于 request 和 responses

In PHP, the request is represented（代表） by global variables \($\_GET, $\_POST, $\_FILE, $\_COOKIE, $\_SESSION...\) and the response is generated\(生成\) by functions \(echo, header, setcookie, ...\).

php 中 请求的变量  $\_GET, $\_POST, $\_FILE, $\_COOKIE, $\_SESSION

响应的方法为 echo, header, setcookie

The first step towards better code is probably to use an Object-Oriented approach\(接近\); that's the main goal \(主要目标\)of the Symfony2 HttpFoundation component: replacing the default PHP global variables and functions by an Object-Oriented layer.

用面向对象来代替原来默认的全局变量和方法

To use this component, open the composer.json file and add it as a dependency for the project:

```
# framework/composer.json
{
    "require": {
        "symfony/class-loader": "2.1.*",
        "symfony/http-foundation": "2.1.*"
    }
}
```

Then, run the composer update command:

```
$ php composer.phar update
```

Finally, at the bottom of the autoload.php file, add the code needed to autoload the component:

```
<?php

// framework/autoload.php

$loader->registerNamespace('Symfony\\Component\\HttpFoundation', __DIR__.'/vendor/symfony/http-foundation');
```

Now, let's rewrite our application by using the Request and the Response classes:

```
<php

// framework/index.php

require_once __DIR__.'/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$input = $request->get('name', 'World');

$response = new Response(sprintf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8')));

$response->send();
```

The createFromGlobals\(\) method creates a Request object based on the current PHP global variables.

基于PHP全局变量 创造request 对象

The send\(\) method sends the Response object back to the client \(it first outputs the HTTP headers followed by the content\).

send 方法 发送响应对象给客户端

Before the send\(\) call, we should have added a call to the prepare\(\) method \($response-&gt;prepare\($request\);\) to ensure that our Response were compliant\(遵从\) with the HTTP specification. For instance\(例子\), if we were to call the page with the HEAD method, it would have removed the content of the Response.

The main difference with the previous code is that you have total control of the HTTP messages. You can create whatever request you want and you are in charge of sending the response whenever you see fit.

可以控制http消息  可以创造request  可以改变 响应

We haven't explicitly\(明确\) set the Content-Type header in the rewritten code as the charset of the Response object defaults to UTF-8.

With the Request class, you have all the request information at your fingertips thanks to a nice and simple API:

可以方便获得请求内容

```
<?php

// the URI being requested (e.g. /about) minus any query parameters
$request->getPathInfo();

// retrieve GET and POST variables respectively
$request->query->get('foo');
$request->request->get('bar', 'default value if bar does not exist');

// retrieve SERVER variables
$request->server->get('HTTP_HOST');

// retrieves an instance of UploadedFile identified by foo
$request->files->get('foo');

// retrieve a COOKIE value
$request->cookies->get('PHPSESSID');

// retrieve an HTTP request header, with normalized, lowercase keys
$request->headers->get('host');
$request->headers->get('content_type');

$request->getMethod();    // GET, POST, PUT, DELETE, HEAD
$request->getLanguages(); // an array of languages the client accepts
```

You can also simulate a request:

模拟一个请求

```
$request = Request::create('/index.php?name=Fabien');
```

With the Response class, you can easily tweak\(扭\) the response:

根据response类 可以轻松控制响应

```
<?php

$response = new Response();

$response->setContent('Hello world!');
$response->setStatusCode(200);
$response->headers->set('Content-Type', 'text/html');

// configure the HTTP cache headers
$response->setMaxAge(10);
```

To debug a Response, cast it to a string; it will return the HTTP representation\(表现\) of the response \(headers and content\).

Last but not the least, these classes, like every other class in the Symfony code, have been audited\(审计\) for security\(安全\) issues by an independent\(独立\) company. And being an Open-Source project also means that many other developers around the world have read the code and have already fixed potential\(潜在\) security problems. When was the last you ordered a professional\(职业\) security audit for your home-made framework?

拥有安全审计和开源

Even something as simple as getting the client IP address can be insecure:

```
<?php

if ($myIp == $_SERVER['REMOTE_ADDR']) {
    // the client is a known one, so give it some more privilege
}
```

It works perfectly fine until you add a reverse proxy \(反向代理\) in front of the production servers; at this point, you will have to change your code to make it work on both your development machine \(where you don't have a proxy\) and your servers:

```
<?php

if ($myIp == $_SERVER['HTTP_X_FORWARDED_FOR'] || $myIp == $_SERVER['REMOTE_ADDR']) {
    // the client is a known one, so give it some more privilege
}
```

Using the Request::getClientIp\(\) method would have given you the right behavior from day one \(and it would have covered the case where you have chained proxies\):

```
<?php

$request = Request::createFromGlobals();

if ($myIp == $request->getClientIp()) {
    // the client is a known one, so give it some more privilege(特权)
}
```

And there is an added benefit: it is secure by default. What do I mean by secure? The $\_SERVER\['HTTP\_X\_FORWARDED\_FOR'\] value cannot be trusted as it can be manipulated\(控制\) by the end user when there is no proxy. So, if you are using this code in production without a proxy, it becomes trivially easy to abuse your system. That's not the case with the getClientIp\(\) method as you must explicitly trust this header by calling trustProxyData\(\):

```
<?php

Request::trustProxyData();

if ($myIp == $request->getClientIp(true)) {
    // the client is a known one, so give it some more privilege
}
```

So, the getClientIp\(\) method works securely in all circumstances\(环境\). You can use it in all your projects, whatever the configuration is, it will behave correctly and safely. That's one of the goal of using a framework. If you were to write a framework from scratch, you would have to think about all these cases by yourself. Why not using a technology\(技术\) that already works?



If you want to learn more about the HttpFoundation component, you can have a look at the API or read its dedicated documentation on the Symfony website.



Believe or not but we have our first framework. You can stop now if you want. Using just the Symfony2 HttpFoundation component already allows you to write better and more testable code. It also allows you to write code faster as many day-to-day problems have already been solved for you.

As a matter of fact, projects like Drupal have adopted \(for the upcoming version 8\) the HttpFoundation component; if it works for them, it will probably work for you. Don't reinvent\(重发发明\) the wheel.

I've almost forgot to talk about one added benefit: using the HttpFoundation component is the start of better interoperability between all frameworks and applications using it \(as of today Symfony2, Drupal 8, phpBB 4, Silex, Midgard CMS, Zikula, ...\).


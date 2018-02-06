Before we start with today's topic, 
let's refactor our current framework just a little to make templates even more readable:
在开始前，先重构下当前的框架
```
http://php.net/manual/zh/function.extract.php
int extract ( array &$array [, int $flags = EXTR_OVERWRITE [, string $prefix = NULL ]] )
 flags
 对待非法／数字和冲突的键名的方法将根据取出标记 flags 参数决定。可以是以下值之一：
 
 EXTR_OVERWRITE
 如果有冲突，覆盖已有的变量。
 EXTR_SKIP
 如果有冲突，不覆盖已有的变量。
 EXTR_PREFIX_SAME
 如果有冲突，在变量名前加上前缀 prefix。
 EXTR_PREFIX_ALL
 给所有变量名加上前缀 prefix。
 EXTR_PREFIX_INVALID
 仅在非法／数字的变量名前加上前缀 prefix。
 EXTR_IF_EXISTS
 仅在当前符号表中已有同名变量时，覆盖它们的值。其它的都不处理。 举个例子，以下情况非常有用：定义一些有效变量，然后从 $_REQUEST 中仅导入这些已定义的变量。
 EXTR_PREFIX_IF_EXISTS
 仅在当前符号表中已有同名变量时，建立附加了前缀的变量名，其它的都不处理。
 EXTR_REFS
 将变量作为引用提取。这有力地表明了导入的变量仍然引用了 array 参数的值。可以单独使用这个标志或者在 flags 中用 OR 与其它任何标志结合使用。
 如果没有指定 flags，则被假定为 EXTR_OVERWRITE。
 extract($request->query->all(), EXTR_SKIP);
```


```
<?php

// example.com/web/front.php

require_once __DIR__.'/../src/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$map = array(
    '/hello' => 'hello',
    '/bye'   => 'bye',
);

$path = $request->getPathInfo();
if (isset($map[$path])) {
    ob_start();
    extract($request->query->all(), EXTR_SKIP);
    include sprintf(__DIR__.'/../src/pages/%s.php', $map[$path]);
    $response = new Response(ob_get_clean());
} else {
    $response = new Response('Not Found', 404);
}

$response->send();
```



As we now extract the request query parameters, simplify the hello.php template as follows:



```
<!-- example.com/src/pages/hello.php -->

Hello <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>
```



Now, we are in good shape to add new features.

One very important aspect of any website is the form of its URLs. Thanks to the URL map, we have decoupled the URL from the code that generates the associated response, but it is not yet flexible enough. For instance, we might want to support dynamic paths to allow embedding data directly into the URL instead of relying on a query string:

# Before


```
/hello?name=Fabien
```



# After


```
/hello/Fabien
```



To support this feature, we are going to use the Symfony2 Routing component. As always, add it to composer.json and run the php composer.phar update command to install it:



```
{
    "require": {
        "symfony/class-loader": "2.1.*",
        "symfony/http-foundation": "2.1.*",
        "symfony/routing": "2.1.*"
    }
}
```



From now on, we are going to use the generated Composer autoloader instead of our own autoload.php. Remove the autoload.php file and replace its reference in front.php:



```
<?php

// example.com/web/front.php

require_once __DIR__.'/../vendor/.composer/autoload.php';

// ...

```


Instead of an array for the URL map, the Routing component relies on a RouteCollection instance:



```
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

```


Let's add a route that describe the /hello/SOMETHING URL and add another one for the simple /bye one:



```
use Symfony\Component\Routing\Route;

$routes->add('hello', new Route('/hello/{name}', array('name' => 'World')));
$routes->add('bye', new Route('/bye'));
```


Each entry in the collection is defined by a name (hello) and a Route instance, which is defined by a route pattern (/hello/{name}) and an array of default values for route attributes (array('name' => 'World')).

>Read the official documentation -- available soon -- for the Routing component to learn more about its many features like URL generation, attribute requirements, HTTP method enforcements, loaders for YAML or XML files, dumpers to PHP or Apache rewrite rules for enhanced performance, and much more.

Based on the information stored in the RouteCollection instance, a UrlMatcher instance can match URL paths:



```
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

$attributes = $matcher->match($request->getPathInfo());
```



The match() method takes a request path and returns an array of attributes (notice that the matched route is automatically stored under the special _route attribute):



```
print_r($matcher->match('/bye'));
array (
  '_route' => 'bye',
);

print_r($matcher->match('/hello/Fabien'));
array (
  'name' => 'Fabien',
  '_route' => 'hello',
);

print_r($matcher->match('/hello'));
array (
  'name' => 'World',
  '_route' => 'hello',
);
```



>Even if we don't strictly need the request context in our examples, it is used in real-world applications to enforce method requirements and more. 

The URL matcher throws an exception when none of the routes match:



```
$matcher->match('/not-found');

// throws a Symfony\Component\Routing\Exception\ResourceNotFoundException
```



With this knowledge in mind, let's write the new version of our framework:



```
<?php

// example.com/web/front.php

require_once __DIR__.'/../vendor/.composer/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

$request = Request::createFromGlobals();
$routes = include __DIR__.'/../src/app.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

try {
extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
ob_start();
include sprintf(__DIR__.'/../src/pages/%s.php', $_route);
$response = new Response(ob_get_clean());
} catch (Routing\Exception\ResourceNotFoundException $e) {
$response = new Response('Not Found', 404);
} catch (Exception $e) {
$response = new Response('An error occurred', 500);
}

$response->send();
```



There are a few new things in the code:

Route names are used for template names;

500 errors are now managed correctly;

Request attributes are extracted to keep our templates simple:



```
<!-- example.com/src/pages/hello.php -->

Hello <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>
```



Routes configuration has been moved to its own file:



```
<?php

// example.com/src/app.php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();
$routes->add('hello', new Routing\Route('/hello/{name}', array('name' => 'World')));
$routes->add('bye', new Routing\Route('/bye'));

return $routes;
```



We now have a clear separation between the configuration (everything specific to our application in app.php) and the framework (the generic code that powers our application in front.php).

With less than 30 lines of code, we have a new framework, more powerful and more flexible than the previous one. Enjoy!

Using the Routing component has one big additional benefit: the ability to generate URLs based on Route definitions. When using both URL matching and URL generation in your code, changing the URL patterns should have no other impact. Want to know how to use the generator? Insanely easy:



```
use Symfony\Component\Routing;

$generator = new Routing\Generator\UrlGenerator($routes, $context);

echo $generator->generate('hello', array('name' => 'Fabien'));
// outputs /hello/Fabien
```



The code should be self-explanatory; and thanks to the context, you can even generate absolute URLs:

echo $generator->generate('hello', array('name' => 'Fabien'), true);
// outputs something like 

http://example.com/somewhere/hello/Fabien

Concerned about performance? Based on your route definitions, create a highly optimized URL matcher class that can replace the default UrlMatcher:



```
 [php]
 $dumper = new  Routing\Matcher\Dumper\PhpMatcherDumper($routes);
echo $dumper->dump();
```



Want even more performance? Dump your routes as a set of Apache rewrite rules:
打印apache重写规则



```
 [php]
 $dumper = new Routing\Matcher\Dumper\ApacheMatcherDumper($routes);
echo $dumper->dump();
```


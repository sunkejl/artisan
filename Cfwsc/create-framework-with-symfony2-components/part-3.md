Up until now, our application is simplistic as there is only one page. 
To spice things up a little bit, let's go crazy and add another page that says goodbye:

```
<?php

// framework/bye.php

require_once __DIR__.'/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

$response = new Response('Goodbye!');
$response->send();
```

As you can see for yourself, much of the code is exactly the same as the one we have written for the first page.
Let's extract the common code that we can share between all our pages. 
Code sharing sounds like a good plan to create our first "real" framework!
把类似的代码提取出来

The PHP way of doing the refactoring would probably be the creation of an include file:
php 重构一般通过 include 一个文件的方式

```
<?php

// framework/init.php

require_once __DIR__.'/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();
```

Let's see it in action:

```
<?php

// framework/index.php

require_once __DIR__.'/init.php';

$input = $request->get('name', 'World');

$response->setContent(sprintf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8')));
$response->send();
```

And for the "Goodbye" page:

```
<?php

// framework/bye.php

require_once __DIR__.'/init.php';

$response->setContent('Goodbye!');
$response->send();
```

We have indeed moved most of the shared code into a central place,
我们把大部分相同的代码移到一个中心位置
but it does not feel like a good abstraction, doesn't it?
但这个看上去还不够抽象
First, we still have the send\(\) method in all pages, 
then our pages does not look like templates, 
and we are still not able to test this code properly.
每个页面都调用send方法 页面看上去不像模板,无法测试

Moreover, adding a new page means that we need to create a new PHP script, 
加个页面我们需要创建一个php脚本
which name is exposed to the end user via the URL \([http://example.com/bye.php](http://example.com/bye.php)\): 
脚本的名字暴露在url中
there is a direct mapping between the PHP script name and the client URL. 
This is because the dispatching of the request is done by the web server directly. 
服务器来调度请求
It might be a good idea to move this dispatching to our code for better flexibility. 
This can be easily achieved by routing all client requests to a single PHP script.
通过一个php脚本作为路由，来分配请求，更加灵活

Exposing a single PHP script to the end user is a design pattern called the "front controller".
暴露一个脚本给终端用户的设计模式叫 前端控制器模式

Such a script might look like the following:

```
<?php

// framework/front.php

require_once __DIR__.'/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

$map = array(
    '/hello' => __DIR__.'/hello.php',
    '/bye'   => __DIR__.'/bye.php',
);

$path = $request->getPathInfo();
if (isset($map[$path])) {
    require $map[$path];
} else {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}

$response->send();
```

And here is for instance the new hello.php script:

```
<?php

// framework/hello.php

$input = $request->get('name', 'World');
$response->setContent(sprintf('Hello %s', htmlspecialchars($input, ENT_QUOTES, 'UTF-8')));
```

In the front.php script, $map associates URL paths with their corresponding PHP script paths.
在入口脚本中 变量map 联系着url 和他们相应的php 脚本地址

As a bonus, if the client asks for a path that is not defined in the URL map,
如果客户端请求一个地址未定义
we return a custom 404 page; you are now in control of your website.
我们返回一个404的页面，现在站点在控制中

To access a page, you must now use the front.php script:

http://example.com/front.php/hello?name=Fabien

http://example.com/front.php/bye

/hello and /bye are the page paths.

Most web servers like Apache or nginx are able to rewrite the incoming URLs 
大部分服务器像apache或者nginx能够重写请求的url
and remove the front controller script so that your users will be able to type http://example.com/hello?name=Fabien, which looks much better.
这样连路由的脚本地址都不需要了

So, the trick is the usage of the Request::getPathInfo() method 
which returns the path of the Request by removing the front controller script name 
including its sub-directories (only if needed -- see above tip).
通过使用getPathInfo方法的技巧，移除控制器的脚本名称

You don't even need to setup a web server to test the code. 
Instead, replace the $request = Request::createFromGlobals(); 
call to something like $request = Request::create('/hello?name=Fabien'); 
where the argument is the URL path you want to simulate(模拟).
不需要服务器就能测试代码，通过构造request 参数 去模拟

Now that the web server always access the same script (front.php) for all our pages, 
现在web服务器通过相同的脚本访问所有的页面
we can secure our code further by moving all other PHP files outside the web root directory:
我们可以把代码从站点的根目录移除


Now, configure your web server root directory to point to web/ and all other files won't be accessible from the client anymore.
只有入口文件可以访问，别的目录不能被客户端访问

For this new structure to work, you will have to adjust some paths in various PHP files; the changes are left as an exercise(锻炼) for the reader.
新的目录接口的调整留给读者去锻炼

The last thing that is repeated in each page is the call to setContent(). We can convert all pages to "templates" by just echoing the content and calling the setContent() directly from the front controller script:
```
<?php

// example.com/web/front.php

// ...

$path = $request->getPathInfo();    
if (isset($map[$path])) {    
    ob_start();    
    include $map[$path];    
    $response->setContent(ob_get_clean());    
} else {    
    $response->setStatusCode(404);    
    $response->setContent('Not Found');    
}
```

And the hello.php script can now be converted to a template:
```php

    <!-- example.com/src/pages/hello.php -->
    <?php $name = $request->get('name', 'World') ?>

    Hello <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>
```
We have our framework for today:

```
<?php

// example.com/web/front.php

require_once __DIR__.'/../src/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

$map = array(
    '/hello' => __DIR__.'/../src/pages/hello.php',
    '/bye'   => __DIR__.'/../src/pages/bye.php',
);

$path = $request->getPathInfo();
if (isset($map[$path])) {
    ob_start();
    include $map[$path];
    $response->setContent(ob_get_clean());
} else {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}

$response->send();
```

Adding a new page is a two step process: 
添加一个新页面需要俩步
add an entry in the map and create a PHP template in src/pages/. 
添加映射，然后创建一个php模板
From a template, get the Request data via the $request variable and tweak the Response headers via the $response variable.
模板 接受请求，返回响应头部和响应变量

If you decide to stop here, you can probably enhance your framework by extracting the URL map to a configuration file.
如果在这里停步，可以通过配置文件来作为url映射来增强框架


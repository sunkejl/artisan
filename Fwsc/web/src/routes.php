<?php
/**
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/10/1
 * Time: 23:39
 */
use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Response;

$routes = new Routing\RouteCollection();
//每一条路由规则都由一个名字（hello）以及一个Route实例来定义，
//而一条路由实例又由一条路由规则（/hello/{name})以及默认值数组（array('name' => 'World')）来定义。
$routes->add('api', new Routing\Route('/api', array(
    '_controller' => 'Api\\Controller\\ApiController::indexAction',
)));

$routes->add('session', new Routing\Route('/session', array(
    '_controller' => 'Api\\Controller\\ApiController::sessionAction',
)));

$routes->add('file', new Routing\Route('/file', array(
    '_controller' => 'File\\Controller\\FileController::indexAction',
)));
$routes->add('fileOpen', new Routing\Route('/fileOpen', array(
    '_controller' => 'File\\Controller\\FileController::fileOpenAction',
)));
$routes->add('fileLock', new Routing\Route('/fileLock', array(
    '_controller' => 'File\\Controller\\FileController::fileLockAction',
)));
$routes->add('preg', new Routing\Route('/preg', array(
    '_controller' => 'Preg\\Controller\\PregController::indexAction',
)));
$routes->add('benchmarks', new Routing\Route('/benchmarks', array(
    '_controller' => 'BenchMarks\\Controller\\BenchMarksController::indexAction',
)));
$routes->add('benchmarks_oop', new Routing\Route('/benchmarks_oop', array(
    '_controller' => 'BenchMarks\\Controller\\BenchMarksController::oopAction',
)));

$routes->add('mysqli', new Routing\Route('/mysqli', array(
    '_controller' => 'Mysqli\\Controller\\MysqliController::indexAction',
)));

$routes->add('hello', new Routing\Route('/hello/{name}', array('name' => 'World', '_controller' => 'render_template')));
$routes->add('bye', new Routing\Route('/bye', array('name' => 'World', '_controller' => 'render_template')));
$routes->add('cc', new Routing\Route('/cc', array('name' => 'World', '_controller' => 'render_template')));
$routes->add('RouteDemo', new Routing\Route('/route', array('name' => 'World', '_controller' => 'render_template')));

$routes->add('hello', new Routing\Route('/hello1/{name}', array(
    'name' => 'World',
    '_controller' => function ($request) {
        return render_template($request);
    },
)));


$routes->add('hello', new Routing\Route('/hello2/{name}', array(
    'name' => 'World',
    '_controller' => function ($request) {
        // $foo将在模板里可见
        $request->attributes->set('foo', 'bar');

        $response = render_template($request);

        // 改变一些头信息
        $response->headers->set('Content-Type', 'text/plain');

        return $response;
    },
)));

$routes->add('leap_year_new', new Routing\Route('/is_leap_year_new/{year}', array(
    'year' => null,
    '_controller' => 'Calendar\\Controller\\LeapYearController::indexAction',
)));

$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => function ($request) {
        if (is_leap_year($request->attributes->get('year'))) {
            return new Response('Yep, this is a leap year!');
        }

        return new Response('Nope, this is not a leap year.');
    },
)));

function is_leap_year($year = null)
{
    if (null === $year) {
        $year = date('Y');
    }

    return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
}
function render_template($request)
{
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();
    include sprintf(__DIR__.'/../src/pages/%s.php', $_route);

    return new Response(ob_get_clean());
}


return $routes;
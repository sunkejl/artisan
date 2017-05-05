<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/5
 * Time: 14:50
 */

use Symfony\Component\Routing;

//include "Controller/Auriel.php";

$routes = new Routing\RouteCollection();
$routes->add('app', new Routing\Route('/', array(
    'name' => 'appName',
    '_controller' => new EkController\AurielController(),
)));
$routes->add('hello', new Routing\Route('/hello/{name}', array('name' => 'World')));
$routes->add('bye', new Routing\Route('/bye'));
$routes->add('RouteDemo', new Routing\Route('/route'));


return $routes;
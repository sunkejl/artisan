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
    '_controller' => '\Ek\Controller\Auriel::indexAction',
    //'_controller' => new \Ek\Controller\Auriel(),
)));
$routes->add('productInsert', new Routing\Route('/product/insert', array(
    'name' => 'productInsert',
    '_controller' => '\Ek\Controller\ProductInfo::insert',
)));
$routes->add('productGetAll', new Routing\Route('/product/getAll', array(
    'name' => 'productGetAll',
    '_controller' => '\Ek\Controller\ProductInfo::getAll',
)));
$routes->add('productFindOne', new Routing\Route('/product/findOne', array(
    'name' => 'productFindOne',
    '_controller' => '\Ek\Controller\ProductInfo::findOne',
)));
$routes->add('hello', new Routing\Route('/hello/{name}', array('name' => 'World')));
$routes->add('bye', new Routing\Route('/bye'));
$routes->add('RouteDemo', new Routing\Route('/route'));


return $routes;
<?php
/**
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/10/1
 * Time: 23:45
 */

use Symfony\Component\Routing;

$routes = include __DIR__.'/../app.php';

$context = new Routing\RequestContext();

$generator = new Routing\Generator\UrlGenerator($routes, $context);
//generate URLs based on Route definitions
echo $generator->generate('hello', array('name' => 'Fabien'));
echo "<br>";
//generate absolute URLs
echo $generator->generate('hello', array('name' => 'Fabien'), true);
echo "<br>";
//Concerned about performance? Based on your route definitions, create a highly optimized URL matcher class that can replace the default UrlMatcher:
$dumper = new Routing\Matcher\Dumper\PhpMatcherDumper($routes);

echo $dumper->dump();

//Want even more performance? Dump your routes as a set of Apache rewrite rules:
echo "<br>";
$dumper = new Routing\Matcher\Dumper\ApacheMatcherDumper($routes);

echo $dumper->dump();
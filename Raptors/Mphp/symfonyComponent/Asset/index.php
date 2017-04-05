<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/26
 * Time: 10:43
 */
include "vendor/autoload.php";
include "DateVersionStrategy.php";
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Symfony\Component\Asset\VersionStrategy\StaticVersionStrategy;
use Symfony\Component\Asset\PathPackage;
use Symfony\Component\Asset\UrlPackage;
use AcmeAsset\DateVersionStrategy;


$package = new Package(new EmptyVersionStrategy());
echo $package->getUrl('/image.png') . PHP_EOL;


$package = new Package(new StaticVersionStrategy('v1'));
echo $package->getUrl('/image.png') . PHP_EOL;
// result: /image.png?v1


// put the 'version' word before the version value
$package = new Package(new StaticVersionStrategy('v1', '%s?version=%s'));
echo $package->getUrl('/image.png') . PHP_EOL;
// result: /image.png?version=v1


// put the asset version before its path
$package = new Package(new StaticVersionStrategy('v1', '%2$s/%1$s'));
echo $package->getUrl('/image.png') . PHP_EOL;
// result: /v1/image.png


$package = new Package(new DateVersionStrategy());
echo $package->getUrl('/img.png') . PHP_EOL;


$package = new PathPackage('/static/images', new StaticVersionStrategy('v1'));
echo $package->getUrl('/logo.png') . PHP_EOL;
// result: /static/images/logo.png?v1

$package = new UrlPackage(
    'http://static.example.com/images/',
    new StaticVersionStrategy('v1')
);
echo $package->getUrl('/logo.png') . PHP_EOL;
// result: http://static.example.com/images/logo.png?v1


$urls = array(
    '//static1.example.com/images/',
    '//static2.example.com/images/',
);
$package = new UrlPackage($urls, new StaticVersionStrategy('v1'));
echo $package->getUrl('/logo.png') . PHP_EOL;
// result: http://static1.example.com/images/logo.png?v1
echo $package->getUrl('/icon.png') . PHP_EOL;
// result: http://static2.example.com/images/icon.png?v1


$versionStrategy = new StaticVersionStrategy('v1');
$defaultPackage = new Package($versionStrategy);
$namedPackages = array(
    'img' => new UrlPackage('http://img.example.com/', $versionStrategy),
    'doc' => new PathPackage('/somewhere/deep/for/documents', $versionStrategy),
);
$packages = new \Symfony\Component\Asset\Packages($defaultPackage, $namedPackages);
echo $packages->getUrl('/main.css');
// result: /main.css?v1
echo $packages->getUrl('/logo.png', 'img');
// result: http://img.example.com/logo.png?v1
echo $packages->getUrl('/resume.pdf', 'doc');
// result: /somewhere/deep/for/documents/resume.pdf?v1



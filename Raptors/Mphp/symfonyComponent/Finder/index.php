<?php
/**
 * http://symfony.com/doc/current/components/finder.html
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/2
 * Time: 16:39
 */
include "vendor/autoload.php";

use Symfony\Component\Finder\Finder;

$finder = new Finder();
$finder->files()->in(__DIR__);

foreach ($finder as $file) {
    // Dump the absolute path
    //var_dump($file->getRealPath());

    // Dump the relative path to the file, omitting the filename
    //var_dump($file->getRelativePath());

    // Dump the relative path to the file
    //var_dump($file->getRelativePathname());
}

$finder->files()->name('*.php');

$finder->files()->name('/\.php$/');

$finder->files()->size('>= 1K')->size('<= 2K');

$finder->files()->contains('lorem ipsum');

$finder->files()->notContains('dolor sit amet');

foreach ($finder as $file) {
    $contents = $file->getContents();
}
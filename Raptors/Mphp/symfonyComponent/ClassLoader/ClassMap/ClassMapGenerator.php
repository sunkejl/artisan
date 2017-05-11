<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/28
 * Time: 15:47
 */
require_once '../vendor/symfony/class-loader/ClassMapGenerator.php';
use Symfony\Component\ClassLoader\ClassMapGenerator;

ClassMapGenerator::dump(__DIR__ . '/library', __DIR__ . '/class_map.php');
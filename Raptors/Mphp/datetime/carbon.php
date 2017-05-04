<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/20
 * Time: 11:42
 */
use Carbon\Carbon;

require dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . "vendor/autoload.php";

printf("Now: %s", Carbon::now());
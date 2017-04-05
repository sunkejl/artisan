<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/26
 * Time: 14:03
 */
include "vendor/autoload.php";
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

$cache = new FilesystemAdapter();
// create a new item by trying to get it from the cache
$numProducts = $cache->getItem('stats.num_products');

// assign a value to the item and save it
$numProducts->set(4711);
$cache->save($numProducts);

// storing an array
$numProducts->set(array(
    'category1' => 4711,
    'category2' => 2387,
));
$cache->save($numProducts);

// retrieve the cache item
$numProducts = $cache->getItem('stats.num_products');
$key = $numProducts->getKey();
$value = $numProducts->get();
if (!$numProducts->isHit()) {
    // ... item does not exists in the cache
}
// retrieve the value stored by the item
$total = $numProducts->get();


// remove the cache item
$cache->deleteItem('stats.num_products');
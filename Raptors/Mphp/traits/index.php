<?php
/**
 * 性状(特征 特点)
 * 类库为获取经纬度
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/19
 * Time: 15:33
 */
require 'vendor/autoload.php';
require 'Geocodable.php';
require 'RetailStore.php';
$adapter = new \Ivory\HttpAdapter\CurlHttpAdapter();
$geocoder = new \Geocoder\Provider\GoogleMaps($adapter);
$store = new RetailStore();
$store->setAddress('420 9th Avenue, New York, NY 10001 USA');
$store->setAddress("上海");
$store->setGeocoder($geocoder);
$latitude = $store->getLatitude();#纬度
$longitude = $store->getLongitude();#经度
echo $latitude, ':', $longitude;

<?php
/**
 * 用来支持Doctrine 命令行
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/8
 * Time: 15:28
 */
require_once "vendor/autoload.php";

//db
$config = new \Doctrine\DBAL\Configuration();
//..
$connectionParams = array(
    'dbname' => 'ts',
    'user' => 'root',
    'password' => '123456',
    'host' => '23.105.217.208',
    'driver' => 'pdo_mysql',
);
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
//$sql = "SELECT * FROM t1";
//$stmt = $conn->query($sql);
//while ($row = $stmt->fetch()) {
//    var_dump($row);
//}

$isDevMode = true;
$config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/Model"), $isDevMode, null, null, false);
$entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);



<?php

namespace App\Providers;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/8
 * Time: 18:29
 */
class Db
{
    public $connections;

    public function setConnections($connections)
    {
        $this->connections = $connections;
    }

    public function __construct(
        array $connections = array(
            'dbname' => 'ts',
            'user' => 'root',
            'password' => '123456',
            'host' => '23.105.217.208',
            'driver' => 'pdo_mysql',
        )
    ) {
        $this->setConnections($connections);
    }

    public function getManager()
    {
        $config = new \Doctrine\DBAL\Configuration();
        $connectionParams = $this->connections;
        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
        $isDevMode = true;
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(array(dirname(__DIR__) . "/Model"),
            $isDevMode, null, null, false);
        $entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);
        return $entityManager;
    }
}
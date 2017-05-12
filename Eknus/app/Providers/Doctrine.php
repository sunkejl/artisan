<?php

namespace App\Providers;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/8
 * Time: 18:29
 */
class Doctrine
{
    /**
     * @var
     */
    private $connections;

    /**
     * Doctrine constructor.
     * @param array $connections
     */
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

    /**
     * @return EntityManager
     */
    public function getManager()
    {
        $config = new Configuration();
        $connectionParams = $this->connections;
        $conn = DriverManager::getConnection($connectionParams, $config);
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration(array(dirname(__DIR__) . "/Model"), $isDevMode, null,
            null, false);
        $entityManager = EntityManager::create($conn, $config);
        return $entityManager;
    }

    /**
     * @param $connections
     */
    public function setConnections($connections)
    {
        $this->connections = $connections;
    }
}
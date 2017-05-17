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
    use ConfigTrait;
    /**
     * @var
     */
    private $connections;


    public function __construct()
    {
        $this->setConnections($this->getDoctrineYaml());
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
        $config = Setup::createAnnotationMetadataConfiguration(array(dirname(__DIR__) . "/Entity"), $isDevMode, null,
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
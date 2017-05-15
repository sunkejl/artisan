<?php

namespace App\Providers;

use Predis\Client;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/8
 * Time: 18:29
 */
class Redis
{
    use ConfigTrait;
    private $connections;


    public function __construct()
    {
        $this->setConnections($this->getRedisYaml());
    }


    public function getManager()
    {
        $client = new Client($this->connections);
        return $client;
    }

    /**
     * @param mixed $connections
     */
    public function setConnections($connections)
    {
        $this->connections = $connections;
    }
}
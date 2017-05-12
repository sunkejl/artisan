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
    private $connections;

    /**
     * Redis constructor.
     * @param $connections
     */
    public function __construct(
        array $connections = array(
            'scheme' => 'tcp',
            'host' => '23.105.217.208',
            'port' => 6379,
        )
    ) {
        $this->connections = $connections;
    }


    public function getManager()
    {
        $client = new Client($this->connections);
        return $client;
    }
}
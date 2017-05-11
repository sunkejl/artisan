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
    public static function getManager()
    {
        $client = new Client([
            'scheme' => 'tcp',
            'host'   => '23.105.217.208',
            'port'   => 6379,
        ]);
        return $client;
    }
}
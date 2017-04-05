<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/26
 * Time: 11:26
 */
namespace Acme;

use Symfony\Component\BrowserKit\Client as BaseClient;
use Symfony\Component\BrowserKit\Response;

class Client extends BaseClient
{
    protected function doRequest($request)
    {
        // ... convert request into a response
        $content="123";
        $status=200;
        $headers = array(
            "Connection: keep-alive",
            "Cache-Control: max-age=0",
        );

        return new Response($content, $status, $headers);
    }
}

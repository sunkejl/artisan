<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/24
 * Time: 16:22
 */
namespace Simplex;

class ContentLengthListener
{
    public function onResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();
        $headers = $response->headers;

        if (!$headers->has('Content-Length')
            && !$headers->has('Transfer-Encoding')
        ) {
            // $headers->set('Content-Length', strlen($response->getContent()));
            $response->setContent($response->getContent() . 'no content');
        } else {
            $response->setContent($response->getContent() . 'has content');
        }
    }
}
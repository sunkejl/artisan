<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/24
 * Time: 16:21
 */
namespace Simplex;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class GoogleListener implements EventSubscriberInterface
{
    public function onResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();

        if ($response->isRedirection()
            || ($response->headers->has('Content-Type')
                && false === strpos($response->headers->get('Content-Type'), 'html'))
            || 'html' !== $event->getRequest()->getRequestFormat()
        ) {
            return;
        }

        $response->setContent($response->getContent() . '|_GA CODE_|');
    }

    public static function getSubscribedEvents()
    {
        return array('responseG' => 'onResponse');
    }
}

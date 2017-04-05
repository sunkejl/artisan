<?php

/**
 * composer 为 classmap  需要dump-autoload 为PSR-4 就不需要手动dump-autoload
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/25
 * Time: 13:43
 */
namespace Api\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ApiController
{
    /**
     *The flush() function does not flush buffering. If ob_start() has been called before or the output_buffering php.ini option is enabled, you must call ob_flush() before flush().
     * Additionally, PHP isn't the only layer that can buffer output. Your web server might also buffer based on its configuration. What's more, if you use FastCGI, buffering can't be disabled at all.
     */
    public function stream()
    {
        $response = new StreamedResponse();
        $response->setCallback(function () {
            var_dump('Hello World');
            flush();
            sleep(2);
            var_dump('Hello World');
            flush();
        });
        $response->send();
    }

    public function redirectResponse()
    {
        $response = new RedirectResponse('http://baidu.com/');
        return $response;
    }

    public function jsonResponse()
    {
        $response = new JsonResponse();
        $response->setData(array(
            'data' => 123
        ));
        return $response;
    }

    public function sessionAction()
    {
        // legacy application configures session
        var_dump(headers_list());
        exit;
        if (!isset($_SESSION)) {
            session_start();
        }
        // Get Symfony to interface with this existing session
        $session = new Session();
        // symfony will now interface with the existing PHP session
        $session->start();
        $session->set('name', 'Drak');
        $name = $session->get('name');
        var_dump($name);

    }

    public function indexAction()
    {
        $request = Request::createFromGlobals();
        $foo = $request->query->get('foo');

        $response = new Response();

        $response->setContent(json_encode(array(
            'data' => $foo,
        )));
        var_dump($_COOKIE);
        $response->headers->set('Content-Type', 'application/json');
        return $response;

        $bar = $request->query->get('bar', 'baz');
        var_dump($foo);
        var_dump($bar);
        // the query string is '?foo[bar]=baz'

        $request->query->get('foo');
        // returns array('bar' => 'baz')

        $request->query->get('foo[bar]');
        // returns null

        $request->query->get('foo')['bar'];
        // returns 'baz'

        $content = $request->getContent();
        var_dump($content);

        $path = $request->getPathInfo();
        var_dump($path);


        $response = new Response();

        $response->setContent(json_encode(array(
            'data' => 123,
        )));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
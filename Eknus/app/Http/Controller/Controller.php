<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 10:19
 */

namespace App\Http\Controllers;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerBuilder;

abstract class Controller
{

    use ContainerAwareTrait;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        //依赖注入容器 #避免每次加载都实例化
        $this->container = new ContainerBuilder();
        $this->container->register("doctrine", "App\Providers\Db");
        $this->container->register("twig", "App\Providers\Twig");
        $this->container->register("log", "App\Providers\Log");
        $this->container->register("session", "App\Providers\Session");
        $this->container->register("mail", "App\Providers\SwiftMail");
        $this->container->register("redis", "App\Providers\Redis");
        $this->container->register("csrf", "App\Providers\Csrf");
        $this->setContainer($this->container);
    }

    /**
     * @return object
     */
    protected function getCsrf(){
        if (!$this->container->has('csrf')) {
            throw new \LogicException('The csrf is not registered in your application.');
        }
        return $this->container->get("csrf");
    }

    /**
     * @return object
     */
    protected function getRedis(){
        if (!$this->container->has('redis')) {
            throw new \LogicException('The redis is not registered in your application.');
        }
        return $this->container->get("redis");
    }

    protected function getMail()
    {
        if (!$this->container->has('mail')) {
            throw new \LogicException('The mail is not registered in your application.');
        }
        return $this->container->get("mail");
    }

    protected function getsSession()
    {
        if (!$this->container->has('session')) {
            throw new \LogicException('The session is not registered in your application.');
        }
        return $this->container->get("session");
    }

    protected function getLog()
    {
        if (!$this->container->has('log')) {
            throw new \LogicException('The log is not registered in your application.');
        }
        return $this->container->get("log");
    }

    /**
     * Shortcut to return the Doctrine Registry service.
     *
     * @return Registry
     *
     * @throws \LogicException If DoctrineBundle is not available
     */
    protected function getDoctrine()
    {
        if (!$this->container->has('doctrine')) {
            throw new \LogicException('The DoctrineBundle is not registered in your application.');
        }
        return $this->container->get('doctrine');
    }

    /**
     * Renders a view.
     *
     * @param string $view The view name
     * @param array $parameters An array of parameters to pass to the view
     * @param Response $response A response instance
     *
     * @return Response A Response instance
     */
    protected function render($view, array $parameters = array(), Response $response = null)
    {
        if ($this->container->has('templating')) {
            return $this->container->get('templating')->renderResponse($view, $parameters, $response);
        }

        if (!$this->container->has('twig')) {
            throw new \LogicException('You can not use the "render" method if the Templating Component or the Twig Bundle are not available.');
        }

        if (null === $response) {
            $response = new Response();
        }

        $response->setContent($this->container->get('twig')->render($view, $parameters));

        return $response;
    }

}
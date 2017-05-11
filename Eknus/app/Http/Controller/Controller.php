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

abstract class Controller
{

    use ContainerAwareTrait;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        //依赖注入容器 #避免每次加载都实例化
        $this->container = new \Symfony\Component\DependencyInjection\ContainerBuilder();
        $this->container->register("doctrine", "App\Providers\Db");
        $this->container->register("twig", "App\Providers\Twig");
        $this->container->register("log", "App\Providers\Log");
        $this->container->register("session", "App\Providers\Session");
        $this->container->register("mail", "App\Providers\SwiftManager");
        $this->container->register("redis", "App\Providers\Redis");
        $this->setContainer($this->container);
    }

    protected function getRedis(){
        return $this->container->get("redis");
    }

    protected function getMail()
    {
        return $this->container->get("mail");
    }

    protected function getsSession()
    {
        return $this->container->get("session");
    }

    protected function getLog()
    {
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
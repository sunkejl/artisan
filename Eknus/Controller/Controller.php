<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 10:19
 */

namespace Ek\Controller;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Controller
{

    use ContainerAwareTrait;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        //依赖注入容器 #避免每次加载都new
        $container = new \Symfony\Component\DependencyInjection\ContainerBuilder();
        $container->register("doctrine", "Ek\Lib\Db");
        $container->register("twig", "Ek\Lib\Twig");
        $container->register("log", "Ek\Lib\Log");
        $container->register("session", "Ek\Lib\Session");
        $this->setContainer($container);
    }

    protected function getsSession()
    {
        return $this->container->get("session");
    }

    protected function log()
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
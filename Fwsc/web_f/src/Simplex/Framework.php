<?php
/**
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/10/2
 * Time: 1:27
 */
namespace Simplex;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\Matcher\UrlMatcherInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;

class Framework extends HttpKernel
{
    protected $matcher;
    protected $resolver;
    protected $dispatcher;

    public function __construct(
        EventDispatcherInterface $dispatcher,
        UrlMatcherInterface $matcher,
        ControllerResolverInterface $resolver
    ) {
        $this->matcher = $matcher;
        $this->resolver = $resolver;
        $this->dispatcher = $dispatcher;
    }

    /**
     * 加入新的路由监听 新的不需要handle
     * @param Request $request
     * @param int $type
     * @param bool $catch
     * @return mixed|Response
     */
    public function handle(
        Request $request,
        $type = HttpKernelInterface::MASTER_REQUEST,
        $catch = true
    ) {
        try {
            $request->attributes->add($this->matcher->match($request->getPathInfo()));
            $controller = $this->resolver->getController($request);
            $arguments = $this->resolver->getArguments($request, $controller);
            $response = call_user_func_array($controller, $arguments);
        } catch (ResourceNotFoundException $e) {
            $response = new  Response('路由不存在', 404);
        } catch (\Exception $e) {
            $response = new Response('发生了什么', 500);
            $this->dispatcher->dispatch('responseT', new ResponseEvent($response, $request));
        }
        $this->dispatcher->dispatch('responseG', new ResponseEvent($response, $request));
        $this->dispatcher->dispatch('response', new ResponseEvent($response, $request));

        return $response;
    }
}
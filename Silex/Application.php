<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/17
 * Time: 16:57
 */
namespace SlimCopy;

use Pimple\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\TerminableInterface;

class Application extends Container implements HttpKernelInterface, TerminableInterface
{
    const VERSION = '2.0.4';
    const EARLY_EVENT = 512;
    const LATE_EVENT = -512;
    protected $providers = array();
    protected $booted = false;
    public function __construct(array $values)
    {
        parent::__construct($values);
    }

    public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
    {
        // TODO: Implement handle() method.
    }

    public function terminate(Request $request, Response $response)
    {
        // TODO: Implement terminate() method.
    }

}
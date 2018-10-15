<?php
/**
 * The service locator design pattern is used when we want to locate various services using lookup.
 * Considering high cost of looking up  for a service,
 * Service Locator pattern makes use of caching technique.
 * For the first time a service is required,
 * Service Locator looks up in caches the service object.
 * Further lookup or same service via Service Locator is done in its cache which improves the performance of application to great extent.
 * Following are the entities of this type of design pattern.
 * Service - Actual Service which will process the request.
 * Reference of such service is to be looked upon in server.
 * Context / Initial Context - Context carries the reference to service used for lookup purpose(目的).
 * Service Locator - Service Locator is a single point of contact to get services by JNDI lookup caching the services. Cache - Cache to store references of services to reuse them Client - Client is the object that invokes the services via ServiceLocator.
 */

namespace Dp\serviceLocator;

interface Service
{
    function execute();

    function getName();
}

class Service1 implements Service
{
    function execute()
    {
        echo __CLASS__ . __FUNCTION__ . PHP_EOL;
    }

    function getName()
    {
        return "Service1";
    }
}

class Service2 implements Service
{
    function execute()
    {
        echo __CLASS__ . __FUNCTION__ . PHP_EOL;
    }

    function getName()
    {
        return "Service2";
    }
}

class InitialContext
{
    function lookup($name)
    {
        if ($name == "Service1") {
            return new Service1();
        } elseif ($name == "Service2") {
            return new Service2();
        }
        return null;
    }
}

class Cache
{
    public $services;

    function getService($name)
    {
        return empty($this->services[$name]) ? null : $this->services[$name];
    }

    function addService(Service $service)
    {
        $this->services[$service->getName()] = $service;
    }
}

class ServiceLocator
{
    public $cache;

    public function __construct()
    {
        $this->cache = new Cache();
    }

    public function getService($name)
    {
        if (empty($this->cache->getService($name))) {
            $service = (new InitialContext())->lookup($name);
            $this->cache->addService($service);
        }
        return $this->cache->getService($name);
    }
}

$serviceLocator = new ServiceLocator();
$service = $serviceLocator->getService("Service1");
$service->execute();



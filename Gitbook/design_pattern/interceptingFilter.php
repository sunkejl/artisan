<?php
/**
 * The intercepting filter design pattern is used when we want to do some pre-processing / post-processing with request or response of the application.
 * Filters are defined and applied on the request before passing the request to actual target application.
 * Filters can do the authentication/ authorization/ logging or tracking of request and then pass the requests to corresponding handlers.
 * Following are the entities of this type of design pattern.
 * Filter - Filter which will performs certain task prior(之前) or after execution of request by request handler.
 * Filter Chain - Filter Chain carries multiple filters and help to execute them in defined order on target.
 * Target - Target object is the request handler
 * Filter Manager - Filter Manager manages the filters and Filter Chain.
 * Client - Client is the object who sends request to the Target object.
 */

namespace Dp\interceptingFilter;

interface Filter
{
    function execute();
}

class AuthenticationFilter implements Filter
{
    function execute()
    {
        echo __FILE__ . __CLASS__ . __FUNCTION__ . PHP_EOL;
    }
}

class DebugFilter implements Filter
{
    function execute()
    {
        echo __FILE__ . __CLASS__ . __FUNCTION__ . PHP_EOL;
    }
}

class Target
{
    function execute()
    {
        echo __FILE__ . __CLASS__ . __FUNCTION__ . PHP_EOL;
    }
}

class FilterChain
{
    public $list = array();
    public $target;

    /**
     * @param mixed $target
     */
    public function setTarget(Target $target)
    {
        $this->target = $target;
    }

    function addFilter(Filter $filter)
    {
        array_push($this->list, $filter);
    }

    function execute($request)
    {
        foreach ($this->list as $v) {
            $v->execute($request);
        }
        $this->target->execute($request);
    }
}

class FilterManager
{
    public $filterChain;

    public function __construct()
    {
        $this->filterChain = new FilterChain();
        $this->filterChain->setTarget(new Target());
    }

    function setFilter(Filter $filter)
    {
        $this->filterChain->addFilter($filter);
    }

    function filterRequest($request)
    {
        $this->filterChain->execute($request);
    }
}

class Client
{
    public $filterManager;

    function setFilterManager(FilterManager $filterManager)
    {
        $this->filterManager = $filterManager;
    }

    function sendRequest($request)
    {
        $this->filterManager->filterRequest($request);
    }
}

$filterManager = new FilterManager();
$filterManager->setFilter(new AuthenticationFilter());
$filterManager->setFilter(new DebugFilter());
$client = new Client();
$client->setFilterManager($filterManager);
$client->sendRequest("home");

<?php
/**
 * 前端控制器模式
 * a controller that handles all requests for a website
 **/
namespace Dp\frontController;

class HomeView
{
    function show()
    {
        echo __CLASS__ . __FUNCTION__ . PHP_EOL;
    }
}

class OfficeView
{
    function show()
    {
        echo __CLASS__ . __FUNCTION__ . PHP_EOL;
    }
}

class Dispatcher
{
    public $homeView;
    public $officeView;

    public function __construct()
    {
        $this->homeView = new HomeView();
        $this->officeView = new OfficeView();
    }

    function dispatch($request)
    {
        if ($request == "home") {
            $this->homeView->show();
        } else {
            $this->officeView->show();
        }
    }

}

class FrontController
{
    public $dispatcher;

    public function __construct()
    {
        $this->dispatcher = new Dispatcher();
    }

    public function AuthenticUser()
    {

    }

    function trackRequest()
    {

    }

    function dispatchRequest($request = null)
    {
        $this->dispatcher->dispatch($request);
    }
}

$front = new FrontController();
$front->dispatchRequest();


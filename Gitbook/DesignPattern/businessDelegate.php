<?php
/**
 * Business Delegate Pattern is used to decouple presentation(介绍) tier(层) and business tier.
 * It is basically use to reduce communication or remote(远程) lookup(查找) functionality to business tier code in presentation(展示) tier code.
 * In business tier we have following entities.
 * Client - Presentation(介绍) tier code.
 * Business Delegate - A single entry point class for client entities(实体) to provide access to Business Service methods.
 * LookUp Service - Lookup service object is responsible(责任) to get relative(相对) business implementation(实现) and provide business object access to business delegate object.
 * Business Service - Business Service interface. Concrete(凝结) classes implement(生效) this business service to provide actual business implementation logic.
 */

namespace Dp\businessDelegate;

interface BusinessServer
{
    function doProcessing();
}

class orderServer implements BusinessServer
{
    function doProcessing()
    {
        echo __CLASS__.PHP_EOF;
    }
}

class dataServer implements BusinessServer
{
    function doProcessing()
    {
        echo __CLASS__.PHP_EOL;
    }
}

class BusinessLookUp
{
    function getBusinessServer($serverName)
    {
        if ($serverName == "order") {
            return new orderServer();
        } else {
            return new dataServer();
        }
    }
}

class BusinessDelegate
{
    public $lookUpServer;
    public $type;

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * businessDelegate constructor.
     * @param $lookUpServer
     */
    public function __construct(BusinessLookUp $lookUpServer)
    {
        $this->lookUpServer = $lookUpServer;
    }

    function doTask()
    {
        $server = $this->lookUpServer->getBusinessServer($this->type);
        $server->doProcessing();
    }
}

class Client
{
    public $delegate;

    /**
     * Client constructor.
     * @param $delegate
     */
    public function __construct(businessDelegate $delegate)
    {
        $this->delegate = $delegate;
    }

    public function doTask()
    {
        $this->delegate->doTask();
    }
}
$delegate = new BusinessDelegate(new BusinessLookUp());
$client = new Client($delegate);
$delegate->setType("order");
$client->doTask();
$delegate->setType("date");
$client->doTask();



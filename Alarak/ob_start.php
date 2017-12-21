<?php

class ParentRequest
{
    public $name;

    public function __construct($name = "")
    {
        $this->name = $name;
    }

    static function getRequestStatic()
    {
        return new static("static name");
    }

    static function getRequestSelf()
    {
        return new self("self name");
    }

}

class Request extends ParentRequest
{

}

var_dump(get_class(Request::getRequestStatic()));//string(7) "Request"

var_dump(get_class(Request::getRequestSelf()));// string(13) "ParentRequest"
#echo Request::getRequestStatic()::test();
exit;
echo "abc" . PHP_EOL;
ob_start();
echo "zxy" . PHP_EOL;
sleep(5);
echo "end" . PHP_EOL;
ob_end_flush();

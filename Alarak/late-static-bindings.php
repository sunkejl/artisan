<?php
//https://stackoverflow.com/questions/5197300/new-self-vs-new-static

//self refers to the same class in which the new keyword is actually written.
//static, in PHP 5.3's late static bindings, refers to whatever class in the hierarchy you called the method on.
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

var_dump(get_class(Request::getRequestSelf()));// string(13) "ParentRequest" 当前的类
exit;

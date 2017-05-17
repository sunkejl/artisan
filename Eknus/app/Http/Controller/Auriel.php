<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\Yaml\Yaml;


class Auriel extends Controller
{
    public function indexAction(Request $request)
    {

        return $this->render("index.html.twig", array("name" => "sk"));
    }

    public function equal()
    {
        var_dump($a = "abc");#abc
    }

    public function encode()
    {
        $array = range("a", "z");
        return new Response($this->getSerializer()->encode($array));
    }

    public function decode()
    {
        $this->getSerializer()->decode();
    }

    public function setLog()
    {
        $this->getLog()->writeLog()->error("error");
        $this->getLog()->writeLog()->warning("warning");
        exit;
    }

    public function getSession()
    {
        $this->getsSession()->getManager()->set("name", "sk");
        var_dump($this->getsSession()->getManager()->get("name"));
        exit;
    }

    public function setRedisAction()
    {
        $client = $this->getRedis()->getManager();
        $client->select(15);
        $client->set('foo', 'bar');
        $value = $client->get('foo');
        var_dump($value);
        exit;
    }

    public function setCsrfAction()
    {
        $c = $this->getCsrf()->getToken("authenticate");
        var_dump($c);
        $v = $this->getCsrf()->isTokenValid("authenticate", $c);
        var_dump($v);
        exit;
    }

    public function mailAction()
    {
        $this->getMail()->set();
    }


    public function dumpYaml()
    {
        $array = array(
            'foo' => 'bar',
            'bar' => array('foo' => 'bar', 'bar' => 'baz'),
        );
        $yaml = Yaml::dump($array);
        file_put_contents('/opt/www/artisan/Eknus/test.yml', $yaml);
    }

    public function getNow()
    {
        printf("Now: %s", Carbon::now());
    }
}

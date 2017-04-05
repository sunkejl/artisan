<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/31
 * Time: 14:30
 */
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
include "vendor/autoload.php";
$container=new ContainerBuilder();
$container->register('mailer',"Mailer")->addArgument('sendmail');
var_dump($container->get("mailer"));

$loader = new YamlFileLoader($container, new FileLocator(__DIR__));
$loader->load('services.yml');


class Mailer
{
    private $transport;

    public function __construct($transport)
    {
        $this->transport = $transport;
        echo $this->transport;
    }

}

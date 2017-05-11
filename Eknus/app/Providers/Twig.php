<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/9
 * Time: 11:51
 */

namespace App\Providers;

class Twig
{
    public function render($view, array $parameters = array())
    {
        $loader = new \Twig_Loader_Filesystem('/opt/www/artisan/Eknus/app/Resources/views');
        $twig = new \Twig_Environment($loader, array(
            'cache' => '/opt/www/artisan/Eknus/var/cache',
            'debug' => true
        ));
        $template = $twig->load($view);
        return $template->render($parameters);
    }
}
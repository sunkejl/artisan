<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/23
 * Time: 18:01
 */
namespace Calendar\Controller;

use Calendar\Model\LeapYear;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController
{
    public function indexAction($year)
    {

        $leapYear = new LeapYear();
        if ($leapYear->isLeapYear($year)) {
            $response = new Response('Yep, this is a leap year!');
        } else {
            $response = new Response('Nope, this is not a leap year.');
        }
        $response->setTtl(10);
       // throw new \Exception("error",300);
        return $response;
    }

}
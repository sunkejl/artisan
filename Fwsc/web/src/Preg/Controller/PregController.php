<?php
namespace Preg\Controller;

/**
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/10/2
 * Time: 22:56
 */
class PregController
{
    public function indexAction()
    {
        $this->timeAction();
        exit;
        preg_match("/./", "IS PHP", $matches);

        preg_match("/PHP.?5/", "PHP 5", $matches);
        preg_match("/a+b/", "cab", $matches);#匹配前面的字符1次或多次 匹配a
        preg_match("/de*f/", "def", $matches);#匹配前面的字符0次或多次 匹配e
        preg_match("/be{2}f/", "beef", $matches);#匹配前面的字符{m}次 匹配e
        preg_match("/be{1,2}f/", "bef", $matches);#匹配前面的字符{m,n} 1或2次 匹配e
        preg_match("/^admin/", "admin login", $matches);#匹配开头
        preg_match("/admin$/", "is admin", $matches);#匹配结尾
        preg_match("/[0-9]+/", "is admin 2016", $matches);#匹配字符类里的内容
        preg_match("/[^0-9]+/", "is admin 2016", $matches);#匹配字符类 取反
        preg_match("/([12][0-9])([0-9]{2})/", "is admin 1916", $matches);#创建子正曾表达式
        #todo #282
        var_dump($matches);
        exit;
    }

    private function timeAction()
    {
        echo microtime();
        var_dump(getdate());
//        0.43708200 1475422863
//array(size = 11)
//  'seconds' => int 3
//  'minutes' => int 41
//  'hours' => int 23
//  'mday' => int 2
//  'wday' => int 0
//  'mon' => int 10
//  'year' => int 2016
//  'yday' => int 275
//  'weekday' => string 'Sunday' (length = 6)
//  'month' => string 'October' (length = 7)
//  0 => int 1475422863
    }
}
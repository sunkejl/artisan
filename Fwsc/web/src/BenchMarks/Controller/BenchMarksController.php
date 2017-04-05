<?php
/**
 * Created by PhpStorm.
 * User: sk
 * Date: 2016/10/3
 * Time: 0:46
 */

namespace BenchMarks\Controller;

class Adder
{
    function add2($a, $b)
    {
        return $a + $b;
    }

    function add3($a, $b, $c)
    {
        return $a + $b;
    }
}

class BenchMarksController
{
    public function indexAction()
    {
        require "ubm.php";
        $str = "this str is not modified";
        $loops = 1000000;
        micro_benchmark("str_replace", "bm_str_replace", $loops);
        micro_benchmark("preg_replace", "bm_preg_replace", $loops);
        exit;
    }

    public function oopAction()
    {
        //比较面向过程，面向对象的速度
        //函数在使用俩个参数比三个参数快11%
        require "ubm.php";
        $loops = 10000000;
        micro_benchmark("proc_2_args", "run_proc_bm2", $loops);
        micro_benchmark("proc_3_args", "run_proc_bm3", $loops);
        micro_benchmark("oop_2_args", "run_oop_bm2", $loops);
        micro_benchmark("oop_3_args", "run_oop_bm3", $loops);
        exit;
    }

    static function adder_add2($a, $b)
    {
        return $a + $b;
    }

    static function adder_add3($a, $b, $c)
    {
        return $a + $b;
    }

    static function run_proc_bm2($count)
    {
        for ($i = 0; $i < $count; $i++) {
            self::adder_add2(5, 7);
        }
    }

    static function run_proc_bm3($count)
    {
        for ($i = 0; $i < $count; $i++) {
            self::adder_add3(5, 7, 9);
        }
    }

    static function run_oop_bm2($count)
    {
        $adder = new Adder();
        for ($i = 0; $i < $count; $i++) {
            $adder->add2(5, 7);
        }
    }

    static function run_oop_bm3($count)
    {
        $adder = new Adder();
        for ($i = 0; $i < $count; $i++) {
            $adder->add3(5, 7, 9);
        }
    }

    static function bm_str_replace($loops)
    {
        global $str;
        for ($i = 0; $i < $loops; $i++) {
            str_replace("is not", "has been", $str);
        }
    }

    static function bm_preg_replace($loops)
    {
        global $str;
        for ($i = 0; $i < $loops; $i++) {
            preg_replace("/is not/", "has been", $str);
        }
    }

}
<?php

    /**
     * 责任链模式(The Chain of Responsibility )
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/6
     * Time: 11:14
     */
    abstract class HomeChecker
    {

        protected $successor;

        public abstract function check(HomeStatus $home);

        public function succeedWith(HomeChecker $successor)
        {
            $this->successor = $successor;
        }

        public function next(HomeStatus $home)
        {
            var_dump($this->successor);
            if ($this->successor) {
                $this->successor->check($home);
            }
        }
    }

    class Locks extends HomeChecker
    {

        public function check(HomeStatus $home)
        {
            if ( ! $home->locked) {
                throw new Exception("door unlock");
            }
            $this->next($home);
        }
    }

    class Lights extends HomeChecker
    {

        public function check(HomeStatus $home)
        {
            if ( ! $home->lightsOff) {
                throw new Exception("lights off");
            }
            $this->next($home);
        }
    }

    class Alarm extends HomeChecker
    {

        public function check(HomeStatus $home)
        {
            if ( ! $home->alarmOn) {
                throw new Exception("alarm off");
            }
            $this->next($home);
        }

    }

    class HomeStatus
    {
        //控制异常输出状态
        public $locked = true;
        public $lightsOff = false;
        public $alarmOn = true;
    }

    $locks = new Locks;
    $lights = new Lights;
    $alarm = new Alarm;


    $locks->succeedWith($lights);//把lights 注册到locks的success里
    $lights->succeedWith($alarm);//把alarm 注册到lights的success里

    $status = new HomeStatus;
    $locks->check($status);

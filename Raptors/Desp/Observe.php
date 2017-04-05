<?php

    /**
     * 观察者模式
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/8
     * Time: 14:16
     */
    interface Subject
    {

        public function attach($observer);

        public function detach($observer);

        public function notify();
    }

    interface Observer
    {

        public function handle();
    }

    class Login implements Subject
    {

        public $observers = [];

        public function attach($observable)
        {
            if (is_array($observable)) {
                return $this->attachObservers($observable);
            }
            $this->observers[] = $observable;

            return $this;
        }

        public function detach($observer)
        {
            var_dump("detach");
        }

        public function notify()
        {
            foreach ($this->observers as $observer) {
                $observer->handle();
            }
        }

        /**
         * @param $observable
         * @throws Exception
         */
        public function attachObservers($observable)
        {
            foreach ($observable as $observer) {
                if ( ! $observer instanceof Observer) {
                    throw new Exception("error");
                }
                $this->attach($observer);
            }
        }

        public function fire()
        {
            $this->notify();
        }
    }

    class LogHandler implements Observer
    {

        public function handle()
        {
            var_dump("log handle");
        }

    }

    class EmailNotifier implements Observer
    {

        public function handle()
        {
            var_dump("send Email");
        }

    }

    class LoginReport implements Observer
    {

        public function handle()
        {
            var_dump("loginReport");
        }

    }

    $login = new Login();
    $login->attach([
        new LogHandler(),
        new EmailNotifier(),
        new LoginReport()
    ]);
    var_dump($login->observers);
    $login->fire();
<?php

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/12
     * Time: 11:33
     */
    interface Logger
    {
        public function executed($message);

    }

    class LogToFile implements Logger
    {

        public function executed($message)
        {
            var_dump("file{$message}");
        }
    }

    class LogToDatabase implements Logger
    {

        public function executed($message)
        {
            var_dump("database{$message}");
        }
    }

    class UserController
    {

        protected $logger;

        public function __construct(Logger $logger)
        {
            $this->logger = $logger;
        }

        public function show()
        {
            $user = "s";
            $this->logger->executed($user);
        }
    }
    $user=new UserController(new LogToFile());
    $user->show();
<?php

    /**
     * 策略（Strategy）模式
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/5
     * Time: 17:03
     */
    interface Logger
    {

        public function log($data);
    }

    class LogToFile implements Logger
    {

        public function log($data)
        {
            var_dump("log to file");
        }
    }
    class LogToDatabase implements Logger
    {

        public function log($data)
        {
            var_dump("log to database");
        }
    }
    class App{
        public function log($data,Logger $logger =null){
            //$logger=new LogToFile;
            $logger = $logger?:new LogToFile;
            $logger->log($data);
        }
    }
    (new App)->log("123",new LogToFile());
    (new App)->log("123",new LogToDatabase());

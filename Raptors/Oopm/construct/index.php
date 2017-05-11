<?php

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/11
     * Time: 13:23
     */
    class Task
    {

        public $description;
        public $completed = false;

        public function __construct($description)
        {
            $this->description = $description;
        }

        public function complete()
        {
            $this->completed = true;
        }
    }

    $task = new Task("OOP");
    $task->complete();
    var_dump($task->description);
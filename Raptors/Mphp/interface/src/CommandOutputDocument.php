<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17
 * Time: 16:10
 */
class CommandOutputDocument implements Documentable
{
    /**
     * @var
     */
    private $command;

    /**
     * CommandOutputDocument constructor.
     * @param $command
     */
    public function __construct($command)
    {
        $this->command = $command;
    }

    public function getContent()
    {
        return shell_exec($this->command);
    }

    public function getId()
    {
        return $this->command;
    }

}
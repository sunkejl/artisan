<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/17
 * Time: 16:39
 */
class StreamDocument implements Documentable
{
    /**
     * @var
     */
    private $resource;
    /**
     * @var int
     */
    private $buffer;

    /**
     * StreamDocument constructor.
     */
    public function __construct($resource,$buffer=4096)
    {
        $this->resource = $resource;
        $this->buffer = $buffer;
    }

    public function getContent()
    {
        $streamContent = '';
        rewind($this->resource);
        while (feof($this->resource) === false) {
            $streamContent .= fread($this->resource, $this->buffer);
        }
        return $streamContent;
    }

    public function getId()
    {
        return 'resource-' . (int)$this->resource;
    }
}
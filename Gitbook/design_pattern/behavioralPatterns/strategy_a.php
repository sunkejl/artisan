<?php
/**
 * Strategy pattern makes a family algorithm and encapsulates each algorithm
 * 把一族不同的算法（业务）封装到不同的类中，使 client 类可以在不知道具体实现的情况下选择实例化其中一个算法
 *
 */

interface OutputInterface
{
    public function load($arrayOfData);
}

class SerializedArrayOutput implements OutputInterface
{
    public function load($arrayOfData)
    {
        return serialize($arrayOfData);
    }
}

class JsonStringOutput implements OutputInterface
{
    public function load($arrayOfData)
    {
        return json_encode($arrayOfData);
    }
}

class ArrayOutput implements OutputInterface
{
    public function load($arrayOfData)
    {
        return $arrayOfData;
    }
}

class MyClient
{
    /**
     * @var OutputInterface
     */
    private $output;

    public function setOutput(OutputInterface $outputType)
    {
        $this->output = $outputType;
    }

    public function loadOutput($arrayOfData)
    {
        return $this->output->load($arrayOfData);
    }
}

$client = new MyClient();
$client->setOutput(new JsonStringOutput());
$result = $client->loadOutput(array(1, 2, 3));
var_dump($result);



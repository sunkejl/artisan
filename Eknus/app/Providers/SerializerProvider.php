<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/16
 * Time: 14:21
 */

namespace App\Providers;


use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SerializerProvider
{
    private $encoders;

    private $normalizers;
    private $serializer;

    public function __construct()
    {
        $this->setEncoders(array(new XmlEncoder(), new JsonEncoder()));
        $this->setNormalizers(array(new ObjectNormalizer(), new ArrayDenormalizer()));
        $this->serializer = new Serializer($this->normalizers, $this->encoders);
    }

    public function encode($data = array(), $format = "json")
    {
        $jsonContent = $this->serializer->serialize($data, $format);
        return $jsonContent;
    }

    public function decode()
    {
        $data = <<<EOF
<person>
    <name>foo</name>
    <age>99</age>
    <sportsman>false</sportsman>
</person>
EOF;

        $person = $this->serializer->deserialize($data, P::class, 'xml');
        var_dump($person);
    }

    /**
     * @param mixed $normalizers
     */
    public function setNormalizers($normalizers)
    {
        $this->normalizers = $normalizers;
    }

    /**
     * @param mixed $encoders
     */
    public function setEncoders($encoders)
    {
        $this->encoders = $encoders;
    }

}

class P
{
    public $name;
    public $age;
    public $sportsman;
}
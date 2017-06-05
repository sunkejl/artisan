<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/1
 * Time: 16:49
 */
class xml
{
    public function xmlToArray()
    {
        $xmlString = "<Root><name>myName</name><age>1</age></Root>";
        $xml = new SimpleXMLElement($xmlString);
        var_dump($r = json_decode(json_encode($xml), true));
    }

    public function arrayToXml()
    {
        // initializing or creating array
        $data = array('total_stud' => 500, "dd" => array(1, 2, 3));

// creating object of SimpleXMLElement
        $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

// function call to convert array to xml
        $this->array_to_xml($data, $xml_data);

//saving generated xml file;
        $result = $xml_data->asXML('/tmp/name.xml');
        var_dump($xml_data->asXML());
    }

    public function array_to_xml($data, &$xml_data)
    {
        foreach ($data as $key => $value) {
            if (is_numeric($key)) {
                $key = 'item' . $key; //dealing with <0/>..<n/> issues
            }
            if (is_array($value)) {
                $subnode = $xml_data->addChild($key);
                $this->array_to_xml($value, $subnode);
            } else {
                $xml_data->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }
}

$x = new xml();
$x->xmlToArray();



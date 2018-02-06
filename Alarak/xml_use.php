<?php
$xmlObj = new SimpleXMLElement("<request></request>");
$xmlObjA = $xmlObj->addChild("name");
$xmlObjA->addChild("childName", "b");
$xmlObj->addChild("age", 1);
$x = $xmlObj->asXML();
var_dump($x);


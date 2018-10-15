<?php
ini_set ("include_path", "/var/log:/usr/var/log:.");

$url = "compress.bzip2://logfile.bz2";
$fil = "compress.zlib://foo1.gz";

$fr = fopen($url, "rb", true);
$fw = fopen($fil, "wb1");

if (is_resource($fr) && is_resource($fw)) {
	while (!feof($fr)) {
		$data = fread($fr, 1024);
		fwrite($fw, $data);
	}
	fclose($fr);
	fclose($fw);
}
?>

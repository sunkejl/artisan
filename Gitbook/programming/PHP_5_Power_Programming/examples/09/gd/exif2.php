<?php
	$image = '../images/img_1554.jpg';
	$size = getimagesize($image);
	$img = imagecreatefromjpeg($image);
	$exif = exif_read_data($image, 'computed', true);

	var_dump($exif);
?>

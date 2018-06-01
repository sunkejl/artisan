<?php
	$size_x = 280;
	$size_y = 120;

	$img = imagecreatetruecolor($size_x, $size_y);

	$white = imagecolorallocate($img, 255, 255, 255);
	$blue = imagecolorallocate($img, 0, 0, 255);

	imagefilledrectangle($img, 0, 0, $size_x -1, $size_y - 1, $white);
	
	imageline($img, 50, 2, $size_x - 2, $size_y - 2, $blue);
	imageantialias($img, true);
	imageline($img, 2, 2, $size_x - 52, $size_y - 2, $blue);

	imagettftext($img, 14, 0, 2, $size_y - 50, $blue, 'arial.ttf', 'anti-aliased');
	imageantialias($img, false);
	imagettftext($img, 14, 0, 132, 30, $blue, 'arial.ttf', 'not anti-aliased');

	/* Output to browser */
	header('Content-type: image/png');
	imagepng($img);
?>

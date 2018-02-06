<?php
	$size_x = 300;
	$size_y = 120;

	$font = 'arial.ttf';

	$c_x = $size_x / 2;
	$c_y = $size_y / 2;
	$character = 'Imågêß?';
	$angle = 0;
	$fs = 38;
	$x_loc = 20;
	$y_loc = $size_y - 30;

	$img = imagecreatetruecolor($size_x, $size_y);
	$white = imagecolorallocate($img, 225, 225, 225);
	$black = imagecolorallocate($img, 0, 0, 0);
	$greenish  = imagecolorallocate($img, 50, 150, 50);
	$reddish  = imagecolorallocate($img, 250, 0, 0);
	imagefilledrectangle($img, 0, 0, $size_x - 1, $size_y - 1, $white);

	$box = imagettfbbox($fs, $angle, $font, $character);
	imageline($img, $x_loc + $box[0], $y_loc + $box[1], $x_loc + $box[2], $y_loc + $box[3], $greenish);
	imageline($img, $x_loc + $box[4], $y_loc + $box[5], $x_loc + $box[6], $y_loc + $box[7], $greenish);
	imageline($img, $x_loc + $box[0], $y_loc + $box[1], $x_loc + $box[6], $y_loc + $box[7], $greenish);
	imageline($img, $x_loc + $box[2], $y_loc + $box[3], $x_loc + $box[4], $y_loc + $box[5], $greenish);

	$sx = $box[4] - $box[0];
	$sy = $box[5] + $box[1];

	imageline($img, $x_loc + $sx / 2, 0, $x_loc + $sx / 2, $size_y, $reddish);
	imageline($img, $x_loc + ($box[0] + $sx) / 2, 0, $x_loc + ($box[0] + $sx) / 2, $size_y, $greenish);
	imageline($img, 0, $y_loc + $sy / 2, $size_x, $y_loc + $sy / 2, $greenish);
	imageline($img, 0, $y_loc + $sy / 2, $size_x, $y_loc + $sy / 2, $reddish);
	
	imagettftext($img, $fs, $angle, $x_loc, $y_loc, $black, $font, $character);

	/* baseline */
	imageline($img, 0, $y_loc, $size_x - 1, $y_loc, $black);

	/* x */
	imageline($img, $x_loc, 0, $x_loc, $size_y - 1, $black);

	/* labels */
	imagettftext($img, 10, 0, $size_x - 70, $y_loc, $black, $font, 'baseline (x)');
	imagettftext($img, 10, 90, $x_loc, 20, $black, $font, '(y)');

	imagettftext($img, 10, 0, $x_loc - 18, $y_loc + $box[3], $greenish, $font, $box[3]);
	imagettftext($img, 10, 0, $x_loc - 18, $y_loc + $box[7], $greenish, $font, $box[7]);
	
	imagettftext($img, 10, 0, $x_loc + $box[0] + 5, $y_loc + $box[3] + 13, $greenish, $font, $box[0]);
	imagettftext($img, 10, 0, $x_loc + $box[2] + 5, $y_loc + $box[3] + 13, $greenish, $font, $box[2]);

	/* Output to browser */
	header('Content-type: image/png');
	imagepng($img);
?>

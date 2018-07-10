<pre>
<?php
	$internal = 'UCS-2BE';
	$output   = 'UTF-8';
	$text = iconv('iso-8859-15', $internal, '¤ 12.50');
	$correct = 0;
	$space = ' ';

	/* Initialize the output buffering mechanism */
	iconv_set_encoding('output_encoding', $output);
	ob_start('ob_iconv_handler');

	echo "Original:             ", bin2hex($text), "\n";

	/* The "wrong" way */
	$amount = substr($text, strpos($text, $space) + 1);

	echo "After substr():         ", bin2hex($amount), "\n";
	ob_flush();
	iconv_set_encoding('internal_encoding', $internal);
	echo $amount;
	ob_flush();

	/* Convert space character to UCS-2BE and match again */
	$space = iconv('iso-8859-1', $internal, $space);
	$amount = iconv_substr($text, iconv_strpos($text, $space) + 1);

	iconv_set_encoding('internal_encoding', 'iso-8859-1');
	echo "\nAfter iconv_substr():         ", bin2hex($amount), "\n";
	ob_flush();
	iconv_set_encoding('internal_encoding', $internal);
	echo $amount;
?>

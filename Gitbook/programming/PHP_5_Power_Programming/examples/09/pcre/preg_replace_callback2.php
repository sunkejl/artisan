<?php
	$show_with_vat = true;
	$format = '&euro; %.2f';
	$exchange_rate = 1.2444;

	function currency_output_vat ($data)
	{
		$price = $data[1];
		$vat_percent = $data[2];
                                                                                                                                              
		$show_vat = isset ($_GLOBALS['show_with_vat']) && $_GLOBALS['show_with_vat'];
                                                                                                                                              
		$amount = ($show_vat) ? $price * (1 + $vat_percent / 100) : $price;
                                                                                                                                              
		return sprintf($GLOBALS['format'], $amount / $GLOBALS['exchange_rate']);
	}

	$data = "This item costs {amount: 27.95 %19%} and the other one costs {amount: 29.95 %0%}.\n";

	echo preg_replace_callback ('/\{amount\:\ ([0-9.]+)\ \%([0-9.]+)\%\}/', 'currency_output_vat', $data);
?>

<?php
	function return_money($amount)
	{
		$li = localeconv();

		$number = number_format($amount, $li['frac_digits'], $li['mon_decimal_point'], $li['mon_thousands_sep']);
		
		if ($amount > 0) {
			$sign_placement = $li['p_sign_posn'];
			$cs_placement = $li['p_cs_precedes'];
			$space = $li['p_sep_by_space'] ? ' ' : '';
			$sign = $li['positive_sign'];
		} else {
			$sign_placement = $li['n_sign_posn'];
			$cs_placement = $li['n_cs_precedes'];
			$space = $li['n_sep_by_space'] ? ' ' : '';
			$sign = $li['negative_sign'];
		}

		/* 1 = amount, 2 = sign, 3 = cs, 4 = space */

		switch ($li['p_sign_posn']) {
			case 0:
				$format = ($sign_placement) ? '(%3$s%4$s%1$s)' : '(%1$s%4$s%3$s)';
				break;
			case 1:
				$format = ($sign_placement) ? '%2$s %3$s%4$s%1$s' : '%2$s %1$s%4$s%3$s';
				break;
			case 2:
				$format = ($sign_placement) ? '%3$s%4$s%1$s %2$s' : '%1$s%4$s%3$s %2$s';
				break;
			case 3:
				$format = ($sign_placement) ? '%2$s %3$s%4$s%1$s' : '%1$s%4$s%2$s %3$s';
				break;
			case 4:
				$format = ($sign_placement) ? '%3$s %2$s%4$s%1$s' : '%1$s%4$s%3$s %2$s';
				break;
		}
		return sprintf($format. "\n", abs($amount), $li['currency_symbol'], $sign, $space);
	}

	setlocale(LC_ALL, 'nl_NL');
	echo return_money(-1291.81);
	echo return_money(1291.81);

	setlocale(LC_ALL, 'en_US');
	echo return_money(-1291.81);
	echo return_money(1291.81);

	setlocale(LC_ALL, 'no_NO');
	echo return_money(-1291.81);
	echo return_money(1291.81);

?>

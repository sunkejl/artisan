<?php
	class str {
		var $string;

		function str($string) {
			$this->string = $string;
		}
	}

	function display_quoted($string)
	{
		$string->string = addslashes($string->string);
		echo $string->string;
	}
		

	$s = new str("Montreal's Finest Bagels\n");

	display_quoted(clone $s);

	echo $s->string;
?>

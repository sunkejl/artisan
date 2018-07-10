<?php

function my_error_handler($num, $str, $file, $line) {
	if (error_reporting() == 0) {
		// print "(silenced) ";
		return;
	}
	switch ($num) {
		case E_WARNING: case E_USER_WARNING:
			$type = "Warning";
			break;
		case E_NOTICE: case E_USER_NOTICE:
			$type = "Notice";
			break;
		default:
			$type = "Error";
			break;
	}
	$file = basename($file);
	print "$type: $file:$line: $str\n";
}


set_error_handler("my_error_handler");

trigger_error("not silenced error", E_USER_NOTICE);
@trigger_error("silenced error", E_USER_NOTICE);

?>

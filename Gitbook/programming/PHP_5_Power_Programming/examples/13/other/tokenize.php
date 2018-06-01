<?php
	$script = file_get_contents('comment.php');

	foreach (token_get_all($script) as $token) {
		if (count($token) == 2) {
			printf ("%-25s [%s]\n", token_name($token[0]), $token[1]);
		} else {
			printf ("%-25s [%s]\n", "", $token[0]);
		}
	}
?>

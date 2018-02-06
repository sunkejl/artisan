<?php
	$fin = fopen("readfrom", "r");
	$fout = fopen("writeto", "w");
	$desc = array (0 => $fin, 1 => $fout);
	$res = proc_open("php", $desc, $pipes);
	if ($res) {
		proc_close($res);
	}
?>

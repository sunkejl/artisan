<?php
	$array1 = array (1, 2, 3, 4);
	$array2 = null;
	$array3 = 'non-array';
	$array4 = array ('a', 'b', 'c');

	print_r(array_merge($array1, $array2, $array3, $array4));

	print_r(null);
?>



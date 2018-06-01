<?php
	class magazine {
		var $title;

		function getTitle() {
			return $this->title;
		}
	}
	$mag = new magazine;
	$mag->title = "Time";

?>

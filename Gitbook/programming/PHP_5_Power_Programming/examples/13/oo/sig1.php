<?php
	class magazine {
		var $title;

		function getTitle(/* dummy */) {
			return $this->title;
		}
	}

	class issues extends magazine {
		var $issues;

		function getTitle($nr) {
			return ($this->title. ' - '. $this->issues[$nr]);
		}
	}

	$mag = new issues;
	$mag->title = "Time";
	$mag->issues = array (1 => 'Jan 2003', 2 => 'Feb 2003');

	echo $mag->getTitle(2);
?>
	

<?php
	class person {
		var $name;

		function __construct($name)
		{
			echo __FUNCTION__, "\n";
			$this->name = $name;
		}

		function person($name)
		{
			echo __FUNCTION__, "\n";
			$this->name = $name;
		}
	}

	$person = new person('Derick');
?>

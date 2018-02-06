<?php
	class Pager {
		function Pager($options)
		{
			var_dump($options);
		}
	}

	class Jumping extends Pager {
		function Jumping($options)
		{
			Pager::Pager($options);
		}
	}

	class Sliding extends Pager {
		function Jumping($options)
		{
			Pager::Pager($options);
		}
	}

	$pager = new Jumping('foo');
?>

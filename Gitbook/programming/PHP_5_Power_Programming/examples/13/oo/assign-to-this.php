<?php
	class Jumping {
	}

	class Sliding {
	}

	class Pager {
		function Pager($type)
		{
			$this = new $type;
		}
	}

	$pager = new Pager('Jumping');
?>

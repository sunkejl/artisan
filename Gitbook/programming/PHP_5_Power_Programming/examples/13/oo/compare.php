<?php
	class bagel {
		var $topping;

		function bagel($topping)
		{
			$this->topping = $topping;
		}
	}

	class icecream {
		var $topping;

		function icecream($topping)
		{
			$this->topping = $topping;
		}
	}

	$bagel = new bagel('chocolade');
	$icecream = new icecream('chocolade');

	if ($bagel == $icecream) {
		echo "A bagel is the same as icecream! (1)\n";
	}

	ini_set('zend.ze1_compatibility_mode', 1);
	if ($bagel == $icecream) {
		echo "A bagel is the same as icecream! (2)\n";
	}
?>

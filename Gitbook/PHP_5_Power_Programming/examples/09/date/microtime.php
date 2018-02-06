<?php
	echo preg_replace('@^(.*)\s(.*)$@e', '\\2 + \\1', microtime()) ;

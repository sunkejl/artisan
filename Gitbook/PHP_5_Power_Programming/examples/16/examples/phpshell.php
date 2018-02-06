#!/bin/sh
exec php -d output_buffering=1 $0 $@
<?php

ob_end_clean();



?>
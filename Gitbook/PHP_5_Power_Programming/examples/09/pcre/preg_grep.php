<?php
$addresses = array('212.187.38.47', '188.141.21.91', '2.9.256.7', '<<empty>>');
$pattern = '@^((\d?\d|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d?\d|1\d\d|2[0-4]\d|25[0-5])@';
$addresses = preg_grep($pattern, $addresses);
print_r($addresses);
?>

<?php

$conn = mysqli_connect("localhost", "test", "", "world");
if (empty($conn)) {
    die("mysqli_connect failed: " . mysqli_connect_error());
}
print "connected to " . mysqli_get_host_info($conn) . "\n";
mysqli_close($conn);

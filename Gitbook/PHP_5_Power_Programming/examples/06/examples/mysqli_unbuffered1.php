<?php

$conn = mysqli_connect("localhost", "test", "", "world");

$conn->real_query("SELECT Name FROM City");
$result = $conn->use_result();
while ($row = $result->fetch_row()) {
    print $row[0] . "<br>\n";
}
$result->free();
$conn->close();

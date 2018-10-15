<?php

$conn = mysqli_connect("localhost", "test", "", "test");

$stmt = $conn->prepare("SELECT * FROM alfas ORDER BY year");
$stmt->execute();
$stmt->bind_result($year, $model, $accel);
print "<table>\n";
print "<tr><th>Model</th><th>0-100 km/h</th></tr>\n";
while ($stmt->fetch()) {
    print "<tr><td>$year $model</td><td>{$accel} sec</td>\n";
}
print "</table>\n";

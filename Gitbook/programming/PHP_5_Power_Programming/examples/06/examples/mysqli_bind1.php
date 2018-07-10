<?php

$conn = mysqli_connect("localhost", "test", "", "test");

$conn->query("CREATE TABLE alfas ".
             "(year INTEGER, model VARCHAR(50), accel REAL)");
$stmt = $conn->prepare("INSERT INTO alfas VALUES(?, ?, ?)");
if (empty($stmt)) {
    die("$conn->error\n");
}
$stmt->bind_param("isd", $year, $model, $accel);

$year = 2003;
$model = '147 2.0 Selespeed';
$accel = 9.3;
$stmt->execute();

$year = 2001;
$model = '156 2.0 Selespeed';
$accel = 8.6;
$stmt->execute();

$year = 2004;
$model = '156 GTA Sportwagon';
$accel = 6.3;
$stmt->execute();

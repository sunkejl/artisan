<?php

$conn = mysqli_connect("localhost", "test", "", "test");

$conn->query("CREATE TABLE files (id INTEGER PRIMARY KEY AUTO_INCREMENT, ".
             "data BLOB)");
$stmt = $conn->prepare("INSERT INTO files VALUES(NULL, ?)");
$stmt->bind_param("s", $data);
$file = "test.jpg";
$fp = fopen($file, "r");
$size = 0;
while ($data = fread($fp, 1024)) {
    $size += strlen($data);
    $stmt->send_long_data(0, $data);
}
//$data = file_get_contents("test.jpg");

if ($stmt->execute()) {
    print "$file ($size bytes) was added to the files table\n";
} else {
    die($conn->error);
}

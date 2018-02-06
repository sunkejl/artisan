<?php

$conn = mysqli_connect("localhost", "test", "", "test");

if (empty($_GET['id'])) {
    $result = $conn->query("SELECT id, length(data) FROM files LIMIT 20");
    if ($result->num_rows == 0) {
        print "No images!\n";
        print "<a href=\"mysqli_blob1.php\">Click here to add one</a>\n";
        exit;
    }
    while ($row = $result->fetch_row()) {
        print "<a href=\"$_SERVER[PHP_SELF]?id=$row[0]\">";
        print "image $row[0] ($row[1] bytes)</a><br />\n";
    }
    exit;
}

$stmt = $conn->prepare("SELECT data FROM files WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
$data = null;
$stmt->bind_result($data);
if (!$stmt->fetch()) {
    die("No such image!");
}

header("Content-type: image/jpeg");
print $data;


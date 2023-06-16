<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "fgb";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$id = $_POST['id'];
$description = $_POST['description'] ;
$sql = "INSERT IGNORE INTO menu (id, name, description) VALUES ('$id', '$name', '$description')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
}
 else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
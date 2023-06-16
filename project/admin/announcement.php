<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fgb';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
$name = $_POST['name'] ;
$id = $_POST['id'] ;
$description = $_POST['description'] ;

$sql = "INSERT INTO announcement (name, id,description) VALUES ('$name', '$id','$description')";

if ($conn->query($sql) === true) {
    echo 'Record inserted successfully.';
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();
?>

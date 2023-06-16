<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fgb';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'SELECT * FROM blog WHERE id = ' . $id;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $description = $row['description'];
    } else {
        echo 'No record found with the given ID.';
        exit;
    }
} else {
    echo 'ID parameter not provided.';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newname = $_POST['name'];
    $newDescription = $_POST['description'];
    $sql = "UPDATE blog SET name='$newname', description='$newDescription' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo 'Record updated successfully.';
        exit;
    } else {
        echo 'Error updating record: ' . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style2.css">
    <title>Edit Menu</title>
</head>
<body>
    <h2>Edit blog</h2>
    <form method="POST" action="">
        <label for="name">name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br><br>
        
        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" value="<?php echo $description; ?>"><br><br>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>

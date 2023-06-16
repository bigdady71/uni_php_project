<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fgb';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$sql = 'SELECT * FROM news';
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>News</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
    <h2>News</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>

        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['description'] . '</td>';  
                echo '<td>
                          <a href="newsedit.php?id=' . $row['id'] . '"> Edit<br>   </a>
                          <a href="newsdelete.php?id=' . $row['id'] . '">  Delete</a>
                      </td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="3">No records found</td></tr>';
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>

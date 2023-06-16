<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['user'];
    $password = $_POST['password'];
    $host = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "fgb";
    
    $pdo = new PDO("mysql:host=$host;dbname=$database", $db_username, $db_password);
    $sql = $pdo->prepare('SELECT * FROM admin WHERE user = ? AND password = ?');
    $sql->execute([$name, $password]);

    $user = $sql->fetch();
    if ($user) {
        $_SESSION['loggedin'] = true;
        header('Location: admin.html');
        exit;
    } else {
        echo 'Invalid username or password'; }}  ?>
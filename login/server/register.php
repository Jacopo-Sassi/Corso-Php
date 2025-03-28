<?php
    $host = 'localhost:3306';
    $db = 'out';
    $user = 'root';
    $password = '';
    $conn = mysqli_connect($host, $user, $password, $db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        echo $username . "/" . $password;
    }
?>
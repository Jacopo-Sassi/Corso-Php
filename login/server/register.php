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

        $query = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {

            $msg = "Registrazione avvenuta con successo!";
        } else {
            $msg ="Errore nella registrazione: " . mysqli_error($conn);
        }
        echo $msg;
    }
    
?>
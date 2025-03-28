<?php
$host = 'localhost:3306';
$db = 'out';
$user = 'root';
$password = '';

// Connessione al database
$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    die("Connessione fallita: " . mysqli_connect_error());
}

// Controllo se i dati sono stati inviati
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query con Prepared Statement per evitare SQL Injection
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        // Verifica dell'utente e della password
        if ($user && password_verify($password, $user['password'])) {
            echo "Accesso riuscito. Benvenuto, " . htmlspecialchars($user['username']) . "!";
        } else {
            echo "Nome utente o password errati.";
        }

        // Chiudere lo statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Errore nella preparazione della query.";
    }
}

// Chiudere la connessione
mysqli_close($conn);
?>

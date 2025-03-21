<?php

$host = "localhost";
$username = "root";
$pass = "";
$db = "libreria";

$conn = mysqli_connect($host, $username, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM libri";
$result = mysqli_query($conn, $query);


if (isset($_POST['genere']) && !empty($_POST['genere'])) {
    $genere = $_POST['genere'];


    $query = "SELECT * FROM libri WHERE genere = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "s", $genere);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    }

    if (isset($_POST['titolo']) && isset($_POST['autore']) && isset($_POST['add-genere']) 
    && isset($_POST['anno']) && isset($_POST['prezzo']) && isset($_POST['isbn'])) {
    
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $addGenere = $_POST['add-genere'];
    $anno = $_POST['anno'];
    $prezzo = $_POST['prezzo'];
    $isbn = $_POST['isbn'];

    if (!empty($titolo) && !empty($autore) && !empty($addGenere) 
        && !empty($anno) && !empty($prezzo) && !empty($isbn)) {
        
        $query2 = "INSERT INTO libri (titolo, autore, genere, anno_pubblicazione, prezzo, isbn) 
                   VALUES (?, ?, ?, ?, ?, ?)";
        $stmt2 = mysqli_prepare($conn, $query2);
        
        mysqli_stmt_bind_param($stmt2, "sssids", $titolo, $autore, $addGenere, $anno, $prezzo, $isbn);

        if (mysqli_stmt_execute($stmt2)) {
            echo "Inserimento avvenuto con successo";
        } else {
            echo "Errore nell'inserimento: " . mysqli_stmt_error($stmt2);
        }

        mysqli_stmt_close($stmt2);
    } else {
        echo "Tutti i campi devono essere compilati!";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo Libri</title>
</head>
<body>


<form action="index.php" method="POST">
    <label for="genere">Genere:</label>
    <input type="text" id="genere" name="genere">
    <button type="submit">Cerca</button> 
    <label for ="titolo">Titolo:</label>
    <input type = "text" id="titolo" name ="titolo"> 
    <label for ="autore">Autore:</label>
    <input type = "text" id="autore" name ="autore"> 
    <label for ="add-genere">Genere:</label>
    <input type = "text" id="add-genere" name ="add-genere">
    <label for ="anno">Anno:</label>
    <input type = "text" id="anno" name ="anno">
    <label for ="prezzo">Prezzo:</label>
    <input type = "text" id="prezzo" name ="prezzo">
    <label for ="isbn">ISBN:</label>
    <input type = "text" id="isbn" name ="isbn">
    <button type="submit">Inserisci</button>
</form>


<table border="1">
    <tr>
        <th>Titolo</th>
        <th>Autore</th>
        <th>Genere</th>
        <th>Anno Pubblicazione</th>
        <th>Prezzo</th>
        <th>ISBN</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['titolo']; ?></td>
        <td><?php echo $row['autore']; ?></td>
        <td><?php echo $row['genere']; ?></td>
        <td><?php echo $row['anno_pubblicazione']; ?></td>
        <td><?php echo $row['prezzo']; ?></td>
        <td><?php echo $row['isbn']; ?></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>

<?php

if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>

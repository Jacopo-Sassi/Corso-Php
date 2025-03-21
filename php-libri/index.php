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

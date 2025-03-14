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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
    <tr>
        <th>Titolo</th>
        <th>Autore</th>
        <th>Genere</th>
        <th>Anno Pubblicazione</th>
        <th>Prezzo</th>
        <th>ISBN</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
    <tr>
        <td><?php echo $row['titolo']; ?></td>
        <td><?php echo $row['autore']; ?></td>
        <td><?php echo $row['genere']; ?></td>
        <td><?php echo $row['anno_pubblicazione']; ?></td>
        <td><?php echo $row['prezzo']; ?></td>
        <td><?php echo $row['isbn']; }?></td>
</table>

<form action="index.php" method="post">
    <laber for = "genere">Genere:</label>
    <input type="text" id= "genere" name="genere">
    <button type="submit">Cerca</button>
</form>

</body>
</html>

<?php
mysqli_close($conn);
?>
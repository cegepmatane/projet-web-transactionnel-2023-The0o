<?php
$servername = "localhost";
$username = "TestUserAdmin";
$password = "123";
$dbname = "wirefit";

$mysqli = new mysqli($servername, $username, $password, $dbname);

$prixMin = $_GET['prixMin'];
$prixMax = $_GET['prixMax'];

$sql = "SELECT * FROM PRODUIT WHERE prixProduit > $prixMin AND prixProduit < $prixMax;";
$result = $mysqli->query($sql);

while ($row = $result->fetch_assoc()) {
    echo $row['nomProduit']." ";
}
?>

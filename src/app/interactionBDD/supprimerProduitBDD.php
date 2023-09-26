<?php
require_once('../config/database.php');

$nomProduit = $_POST['nomProduit'];

$sql = "DELETE FROM PRODUIT WHERE nomProduit=?";

$requete_sql = $conn->prepare($sql);
$requete_sql->bind_param("s", $nomProduit);
$requete_sql->execute();

$conn->close();
?>

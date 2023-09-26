<?php
require_once('../config/database.php');

$nomProduit = $_POST['nomProduit'];
$prixProduit = $_POST['prixProduit'];
$sousTitreProduit = $_POST['sousTitreProduit'];
$descriptionProduit = $_POST['descriptionProduit'];
$marqueProduit = $_POST['marqueProduit'];
$reductionProduit = $_POST['reductionProduit'];
$sexeProduit = 'Homme';
$afficherProduit = 1;// A MODIFIER
$typeProduit = $_POST['typeProduit'];
$imageUnProduit = $_POST['imageUnProduit'];
$imageDeuxProduit = $_POST['imageUnProduit'];

$taillesProduit = $_POST['taillesProduit'];
$couleursProduits = $_POST['couleursProduits'];

if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
    $total_images = count($_FILES['images']['name']);

    $chemin_temporaire_un = $_FILES['images']['tmp_name'][0];
    $imageUnProduit = file_get_contents($chemin_temporaire);

    $chemin_temporaire_deux = $_FILES['images']['tmp_name'][1];
    $imagesDeuxProduit = file_get_contents($chemin_temporaire);
}

$sql = "INSERT INTO PRODUIT (nomProduit, prixProduit, sousTitreProduit, descriptionProduit, marqueProduit, reductionProduit, sexeProduit, afficherProduit, typeProduit, imageUnProduit, imageDeuxProduit) VALUES ('$nomProduit', '$prixProduit', '$sousTitreProduit', '$descriptionProduit', '$marqueProduit', '$reductionProduit', '$sexeProduit', '$afficherProduit', '$typeProduit', '$imageUnProduit', '$imageDeuxProduit')";

$requete_sql = $conn->prepare($sql);
$requete_sql->execute();

$conn->close();
?>

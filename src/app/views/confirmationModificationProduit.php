<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../controllers/ProduitController.php');

$produitController = new ProduitController($mysqli);
if (isset($_GET['id'])) {
    $idProduit = $_GET['id'];
} else {
    $idProduit = 1;
}

if (isset($_GET['nomProduit'])) {
    $nomProduit = $_GET['nomProduit'];
} else {
    $nomProduit = "truc";
}

if (isset($_GET['prixProduit'])) {
    $prixProduit = $_GET['prixProduit'];
} else {
    $prixProduit = 1;
}

if (isset($_GET['sousTitreProduit'])) {
    $sousTitreProduit = $_GET['sousTitreProduit'];
} else {
    $sousTitreProduit = "mineur";
}

if (isset($_GET['descriptionProduit'])) {
    $descriptionProduit = $_GET['descriptionProduit'];
} else {
    $descriptionProduit = "aucune";
}

if (isset($_GET['marqueProduit'])) {
    $marqueProduit = $_GET['marqueProduit'];
} else {
    $marqueProduit = "nike";
}

if (isset($_GET['reductionProduit'])) {
    $reductionProduit = $_GET['reductionProduit'];
} else {
    $reductionProduit = 1;
}

if (isset($_GET['couleurProduit'])) {
    $couleurProduit = $_GET['couleurProduit'];
} else {
    $couleurProduit = "Noir";
}

if (isset($_GET['imagesProduit'])) {
    $imagesProduit = $_GET['imagesProduit'];
} else {
    $imagesProduit = "null";
}

if (isset($_GET['imagesDeuxProduit'])) {
    $imagesDeuxProduit = $_GET['imagesDeuxProduit'];
} else {
    $imagesDeuxProduit = "null";
}

$produits = $produitController->modifierProduit($idProduit, $nomProduit, $prixProduit, $sousTitreProduit, $descriptionProduit, $marqueProduit, $reductionProduit, $couleurProduit, $imagesProduit, $imagesDeuxProduit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Votre produit a bien été modifié</p>
    <button>
        <a href="./pageAdmin.php">
            <p>Retour à la page</p>
        </a>
    </button>
</body>
</html>

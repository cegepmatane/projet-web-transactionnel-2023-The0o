<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../controllers/ProduitController.php');

$produitController = new ProduitController($mysqli);

$idProduit = $_POST['idProduit'];
$nomProduit = $_POST['nomProduit'];
$prixProduit = $_POST['prixProduit'];
$descriptionProduit = $_POST['descriptionProduit'];
$marqueProduit = $_POST['marqueProduit'];
$reductionProduit = $_POST['reductionProduit'];
$sexeProduit = $_POST['sexeProduit'];
$afficherProduit = $_POST['afficherProduit'];
$typeProduit = $_POST['typeProduit'];
$imagesProduit = $_FILES['imageUn'];
$imagesDeuxProduit = $_FILES['imageDeux'];

$produits = $produitController->modifierProduit($idProduit, $nomProduit, $prixProduit, $descriptionProduit, $marqueProduit, $reductionProduit, $sexeProduit, $afficherProduit, $typeProduit, $imagesProduit, $imagesDeuxProduit);

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

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
$produits = $produitController->supprimerProduit($idProduit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Votre produit a bien été supprimé</p>
    <button>
        <a href="./pageAdmin.php">
            <p>Retour à la page</p>
        </a>
    </button>
</body>
</html>

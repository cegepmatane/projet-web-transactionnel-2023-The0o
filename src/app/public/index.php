<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../models/Produit.php');
require_once('../models/ProduitDAO.php');

$produitDAO = new ProduitDAO($mysqli);

$produits = $produitDAO->getAllProduits();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des produits test</title>
</head>
<body>
    <h1>Liste des produits</h1>
    <ul>
        <?php foreach ($produits as $produit): ?>
            <li>
                <h2><?php echo $produit->nomProduit; ?></h2>
                <p>Prix : <?php echo $produit->prixProduit; ?> EUR</p>
                <p>Description : <?php echo $produit->descriptionProduit; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

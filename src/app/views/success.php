<?php
require_once('../models/TransactionDAO.php');
require_once('../controllers/PanierController.php');
require_once('../config/database.php');
require_once('../config/config.php');
require_once('../controllers/ProduitController.php');
require_once('../models/Utilisateur.php');

$arrayy = $_SESSION['paiement'];
$idProduit = array();
$quantite = array();
$total = 0;
array_map(function(array $product) {
    array_push($idProduit, $product['idProduit']);
    array_push($idProduit, $product['quantite']);
    $total += $product['quantite'] * $product['prix'] * 100;
}, $arrayy);
$mysqli = new mysqli('localhost', 'TestUserAdmin', '123', 'wirefit');
$transactionDAO = new TransactionDAO($mysqli);
$transactionDAO->addTransaction($idProduit, $quantite, $total);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5;Accueil.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    L'achat a été effectué avec succès ! Redirection dans 5 secondes.
</body>
</html>
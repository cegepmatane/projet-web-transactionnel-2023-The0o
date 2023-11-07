<?php
//echo "C";
require_once('../models/TransactionDAO.php');
//require_once('../controllers/PanierController.php');
//require_once('../config/database.php');
//require_once('../config/config.php');
//require_once('../controllers/ProduitController.php');
//require_once('../models/Utilisateur.php');
//echo "B";
$arrayy = $_SESSION['paiement'];
$idProduit = array();
$quantite = array();
$total = 0;
//echo "a";
//array_map(function(array $product) {
    //array_push($idProduit, $product['idProduit']);
    //array_push($idProduit, $product['quantite']);
    //$total += $product['quantite'] * $product['prix'] * 100;
//}, $arrayy);
foreach ($arrayy as &$product) {
    array_push($idProduit, $product['idProduit']);
    array_push($idProduit, $product['quantite']);
    $total += $product['quantite'] * $product['prix'] * 100;
}
//echo "e";
//$mysqli = new mysqli('localhost', 'userTransaction', 'mdp', 'wirefit');
$mysqli = $_SESSION['mysqli'];
//echo $mysqli;
//echo "g";
//$transactionDAO = new TransactionDAO($mysqli);
//echo "f";
//$transactionDAO->addTransaction($idProduit, $quantite, $total);
//echo "d";
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

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../controllers/ProduitController.php');
$produitController = new ProduitController($mysqli); 

if ($_SERVER['REQUEST_URI'] === '/projet-web-transactionnel-2023-The0o/src/app/views/ListeProduit.php') {
    $produitController->afficherTousLesProduits();
}elseif($_SERVER['REQUEST_URI'] === '/projet-web-transactionnel-2023-The0o/src/app/views/Accueil.php'){
    $produitController->afficherProduitAccueil();
}else{
    $produitController->afficherProduitAccueil();
}
?>


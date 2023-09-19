<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../controllers/ProduitController.php');
$produitController = new ProduitController($mysqli); 

$produitController->afficherProduitAccueil();
?>

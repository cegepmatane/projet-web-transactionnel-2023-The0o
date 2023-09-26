<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require_once '../controllers/ProduitController.php';
    $produitController = new ProduitController($mysqli);
    $nomProduit = $_POST["nomProduit"];
    $prixProduit = $_POST["prixProduit"];
    $descriptionProduit = $_POST["descriptionProduit"];
    $marqueProduit = $_POST["marqueProduit"];
    $reductionProduit = $_POST["reductionProduit"];
    $couleurProduit = $_POST["couleurProduit"];
    $tailleProduit = $_POST["tailleProduit"];
    $typeProduit = $_POST["typeProduit"];
    $imageProduit = $_FILES["imageProduit"]["tmp_name"];
    $imageProduit2 = $_FILES["imageProduit2"]["tmp_name"];
    $produitController->ajouterUnProduit($nomProduit,$prixProduit,$descriptionProduit,$marqueProduit,$reductionProduit,$couleurProduit,$tailleProduit,$typeProduit,$imageProduit,$imageProduit2);
?>

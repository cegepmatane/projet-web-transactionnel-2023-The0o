<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require_once '../controllers/ProduitController.php';
    $produitController = new ProduitController($mysqli);
    $nomTaille = $_POST["nomTaille"];
    $tailles = $produitController->ajouterUneTaille($nomTaille);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Votre ajout a  bien ete pris en compte.
    <button><a href="AjouterUneTaille.php">RETOUR</a></button>
</body>
</html>
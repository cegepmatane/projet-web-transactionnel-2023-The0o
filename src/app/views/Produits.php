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
$produits = $produitController->afficherUnProduitParSonId($idProduit);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="../public/css/pageProduit.css" />
    <link rel="stylesheet" type="text/css" href="../public/css/navBar.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="../public/js/slider_pageProduit.js"></script>
</head>

<body>
    <div id="navBar">
        <a href="../public/index.php">
      <div id="logo">
        WIREFIT
      </div>
      </a>
      <div id="naviguerCategories">
        <a href="../views/ListeProduit.php">Homme</a>
        <a href="../views/ListeProduit.php">Femme</a>
        <a href="../views/ListeProduit.php">Enfant</a>
      </div>
      <div id="imageDefilerMenu">
        <img src="../img/menu.svg" alt="Menu déroulant">
      </div>
    </div>
    <div class="body">
        <div class="article">
            <div id="images">
                <img id="image" src="../img/airMax270.png" alt="image1">
                <div id="precedent" onclick="changeImage(-1)">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                        <path
                            d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                    </svg>
                </div>
                <div id="suivant" onclick="changeImage(1)">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                        <path
                            d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                    </svg>
                </div>
            </div>
            <div class="informations">
                <p class="titre"><?php echo $produits->nomProduit?></p>
                <p class="gamme"><?php echo $produits->sousTitreProduit?></p>
                <p class="marque"><?php echo $produits->marqueProduit?></p><br>
                <p class="prix"><?php echo $produits->prixProduit?> $</p><br>
                <p class="description"><?php echo $produits->descriptionProduit?>
                </p><br>

                <div class="personnalisation">
                    <button>
                        <p>Taille</p>
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.85354 5.9898C2.06405 5.77843 2.34989 5.65932 2.64819 5.65867C2.9465 5.65802 3.23286 5.77587 3.44429 5.98631L9.02522 11.5429L14.5818 5.96192C14.7935 5.75653 15.0774 5.64251 15.3724 5.64443C15.6674 5.64635 15.9498 5.76404 16.1588 5.97217C16.3679 6.1803 16.4868 6.4622 16.49 6.75717C16.4932 7.05213 16.3805 7.33656 16.176 7.54918L9.82582 13.9272C9.61531 14.1386 9.32948 14.2577 9.03117 14.2584C8.73286 14.259 8.4465 14.1412 8.23507 13.9307L1.85703 7.58054C1.64566 7.37004 1.52655 7.0842 1.5259 6.78589C1.52525 6.48758 1.6431 6.20123 1.85354 5.9898Z"
                                fill="black" />
                        </svg>
                    </button>
                    <button>
                        <p>Couleur</p>
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.85354 5.9898C2.06405 5.77843 2.34989 5.65932 2.64819 5.65867C2.9465 5.65802 3.23286 5.77587 3.44429 5.98631L9.02522 11.5429L14.5818 5.96192C14.7935 5.75653 15.0774 5.64251 15.3724 5.64443C15.6674 5.64635 15.9498 5.76404 16.1588 5.97217C16.3679 6.1803 16.4868 6.4622 16.49 6.75717C16.4932 7.05213 16.3805 7.33656 16.176 7.54918L9.82582 13.9272C9.61531 14.1386 9.32948 14.2577 9.03117 14.2584C8.73286 14.259 8.4465 14.1412 8.23507 13.9307L1.85703 7.58054C1.64566 7.37004 1.52655 7.0842 1.5259 6.78589C1.52525 6.48758 1.6431 6.20123 1.85354 5.9898Z"
                                fill="black" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

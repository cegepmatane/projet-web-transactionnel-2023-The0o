<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../controllers/PanierController.php');
require_once('../controllers/ProduitController.php');
require_once('../models/Utilisateur.php');
session_start();
$panierController = new PanierController($mysqli);
$produitController = new ProduitController($mysqli);
$utilisateurObjet = $_SESSION['utilisateur'];
$emailUtilisateur = $utilisateurObjet->getEmail();
$panier = $panierController->ListPanierProduit($emailUtilisateur);
$listeProduit = [];
if ($panier !== null) {
    foreach ($panier as $produit) {
        $listeProduit[] = $produitController->afficherUnProduitParSonId($produit->idProduit);
    }
}
$total = $panierController->afficherPrixPanier($emailUtilisateur);
$total = implode($total);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiment</title>
    <link rel="stylesheet" href="../public/css/listeProduit.css">
    <link rel="stylesheet" href="../public/css/navBar.css">
    <link rel="stylesheet" href="../public/css/commande.css">
</head>

<body>
    <div id="navBar">
        <div id="logo">
            WIREFIT
        </div>
        <div id="imageDefilerMenu">
            <img src="../img/menu.svg" alt="Menu déroulant">
        </div>
    </div>
    <div class="container">
        <div>
            <a href="PanierUtilisateur.php">
                <button class="btn-retour">
                    <div class="d-flex-a">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="15" viewBox="0 0 9 15" fill="none">
                            <path d="M8.3464 0.364541C8.5573 0.57551 8.67578 0.861606 8.67578 1.15992C8.67578 1.45823 8.5573 1.74432 8.3464 1.95529L2.77765 7.52404L8.3464 13.0928C8.55132 13.305 8.66472 13.5891 8.66216 13.8841C8.65959 14.1791 8.54128 14.4613 8.33269 14.6698C8.12411 14.8784 7.84194 14.9967 7.54697 14.9993C7.252 15.0019 6.96782 14.8885 6.75565 14.6835L0.391521 8.31942C0.180616 8.10845 0.0621367 7.82235 0.0621367 7.52404C0.0621367 7.22573 0.180616 6.93963 0.391521 6.72867L6.75565 0.364541C6.96662 0.153636 7.25271 0.0351563 7.55102 0.0351563C7.84933 0.0351563 8.13543 0.153636 8.3464 0.364541Z" fill="white" />
                        </svg>
                        <p>Retour</p>
                    </div>
                </button>
            </a>
        </div>
        <div class="info-commande">
            <div class="bg-commande adresse-livraison">
                <div class="titre-commande">ADRESSE DE LIVRAISON</div>
                <div class="champs-commande">
                    <p>Nom de famille :</p>
                    <input id="nomFamille" type="text">
                </div>
                <div class="champs-commande">
                    <p>Prénom :</p>
                    <input id="prenom" type="text">
                </div>
                <div class="champs-commande">
                    <p>Adresse mail :</p>
                    <input id="adressEmail" type="text">
                </div>
                <div class="commande-adresse-ville">
                    <div class="champs-commande">
                        <p>Adresse de livraison : </p>
                        <input id="adresseLivraison" type="text">
                    </div>
                    <div class="champs-commande">
                        <p>Ville :</p>
                        <input id="ville" type="text">
                    </div>
                </div>
            </div>

            <div class="bg-commande commande">
                <div class="titre-commande">COMMANDE</div>

                <?php foreach ($listeProduit as $key => $produit) { ?>
                    <div class="item">
                        <div class="contenu-commande">
                            <div class="info-nom-categorie">
                                <div class="nom-produit txt-g3"><?php echo $produit->nomProduit ?></div>
                                <div class="categorie"><?php echo $produit->descriptionProduit ?></div>
                            </div>
                            <p>x<?php echo $panier[$key]->QuantiterProduit ?></p>
                            <div class="prix">
                                <div class="txt-g3"><?php echo $produit->prixProduit ?> $</div>
                            </div>
                        </div>
                        <div class="barre"></div>
                    </div>
                <?php } ?>
                <p class="total txt-g3">TOTAL : <?php echo $total ?> $</p>
            </div>
            <div class="btn-paypal">
                <a href="pay.php">paypal</a>
            </div>
        </div>
    </div>
</body>

</html>

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
if($panier !== null){
    foreach($panier as $produit){
        $listeProduit[] = $produitController->afficherUnProduitParSonId($produit->idProduit);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
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
        <?php foreach ($listeProduit as $produit): ?>
    <div class="item">
        <div class="contenu-commande">
            <div class="info-nom-categorie">
                <div class="nom-produit txt-g3"><?php echo $produit->nomProduit; ?></div>
                <div class="categorie"><?php echo $produit->descriptionProduit; ?></div>
            </div>
            <div class="btn-produit">
                <div class="select-quantity contenu-commande">
                    <label for="quantity">Quantité :</label>
                    <select class="quantity" name="quantity">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="contenu-commande">
                <div class="poubel contenu-commande">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/>
                    </svg>
                </div>
                <div class="txt-g3 prix"><?php echo $produit->prixProduit; ?> $</div>
            </div>
        </div>
        <div class="barre"></div>
    </div>
<?php endforeach; ?>


        <div class="total txt-g3">TOTAL : 150 $</div>
        </div>
        <div class="commander">
            <button class="btn-commander">Commander</button>
    </div>
   
</body>
</html>

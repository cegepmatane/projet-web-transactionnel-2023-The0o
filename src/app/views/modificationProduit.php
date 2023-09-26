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
$produit = $produitController->afficherUnProduitParSonId($idProduit);
$tailles = $produitController->afficherTailleParProduit($idProduit);
$couleurs = $produitController->afficherCouleurParProduit($idProduit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="contenuProduit">
    <div class="titrePopup">
        <p>Modifier un produit</p>
    </div>
    <form method="GET" action="./confirmationModificationProduit.php">
        <div class="champsProduit">
            <input type="hidden" name="id" value="<?php echo $produit->idProduit; ?>">
            <div class="champ">
                <p>Nom du produit</p>
                <input type="text" value="<?php echo $produit->nomProduit; ?>">
            </div>
            <div class="champ">
                <p>Marque du produit</p>
                <input type="text" value="<?php echo $produit->marqueProduit; ?>">
            </div>
            <div class="champ">
                <p>Prix du produit</p>
                <input type="text" value="<?php echo $produit->prixProduit; ?>">
            </div>
            <div class="champ">
                <p>Description du produit</p>
                <input type="text" value="<?php echo $produit->descriptionProduit; ?>">
            </div>
            <div class="champ">
                <p>Tailles du produit</p>
                <div id="choixTailles">
                    <?php foreach ($tailles as $taille): ?>
                        <div>
                            <input type="checkbox" name="<?php echo $taille->taille ?>" value="<?php echo $taille->taille ?>">
                            <label for="<?php echo $taille->taille ?>"><?php echo $taille->taille ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="champ">
                <p>Couleurs du produit</p>
                <div id="champCouleurs">
                    <?php foreach ($couleurs as $couleur): ?>
                        <div>
                            <input type="checkbox" name="<?php echo $couleur->nomCouleur ?>" value="<?php echo $couleur->nomCouleur ?>">
                            <label for="<?php echo $couleur->nomCouleur ?>"><?php echo $couleur->nomCouleur ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="champ">
                <p>Images du produit</p>
                <input name="images[]" type="file" accept="image/png, image/jpeg" multiple />
            </div>
        </div>
        <div class="boutonsConfirmationEtAnnulation">
            <button class="boutonConfirmationPopup" onclick="fermerPopupModification()">
                <p>Annuler</p>
                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                    viewBox="0 0 384 512">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </button>
            <button type="submit" class="boutonConfirmationPopup">
                <p>Confirmer</p>
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
            </button>
        </div>
    </form>
</div>
</body>
</html>

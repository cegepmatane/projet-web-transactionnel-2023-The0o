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
$produit = $produitController->afficherUnProduitParSonIdAvecAfficher($idProduit);
$categories = $produitController->afficherListeDesCategorie();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification d'un produit</title>
    <link rel="stylesheet" type="text/css" href="../public/css/modificationProduit.css" />
</head>
<body>
<div class="contenuProduit">
    <form method="post" action="./confirmationModificationProduit.php" enctype="multipart/form-data">
        <div class="titrePopup">
            <p>Modifier un produit</p>
        </div>
        <div class="champsProduit">
            <input type="hidden" name="idProduit" value="<?php echo $produit->idProduit; ?>" required>
            <div class="champ">
                <p>Nom du produit</p>
                <input type="text" name="nomProduit" value="<?php echo $produit->nomProduit; ?>" required>
            </div>
            <div class="champ">
                <p>Prix du produit</p>
                <input type="number" name="prixProduit" value="<?php echo $produit->prixProduit; ?>" required>
            </div>
            <div class="champ">
                <p>Description du produit</p>
                <input type="text" name="descriptionProduit" value="<?php echo $produit->descriptionProduit; ?>" required>
            </div>
            <div class="champ">
                <p>Marque du produit</p>
                <input type="text" name="marqueProduit" value="<?php echo $produit->marqueProduit; ?>" required>
            </div>
            <div class="champ">
                <p>Réduction sur le produit</p>
                <input type="number" name="reductionProduit" value="<?php echo $produit->reductionProduit; ?>" required>
            </div>
            <div class="champ">
                <p>Type de sexe du produit</p>
                <select id="sexeProduit" name="sexeProduit" required>
                    <option value="0">Homme</option>
                    <option value="1">Femme</option>
                    <option value="2">Enfant</option>
                </select>
            </div>
            <div class="champ">
                <p>Affichage du produit</p>
                <div id="choixAffichageRadioButtons">
                    <div id="noAffichageRadioButton">
                        <input type="checkbox" id="reponseNoAffichage" name="afficherProduit" <?php echo $produit->afficherProduit == 1 ? 'checked' : ''; ?>>
                    </div>
                </div>
            </div>
            <div class="champ">
                <p>Type de produit</p>
                <select id="typeProduit" name="typeProduit" required>
                    <?php foreach ($categories as $categorie): ?>
                        <option value="<?php echo $categorie->nomCategorie ?>" required><?php echo $categorie->nomCategorie ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="champ">
                <p>Première image du produit</p>
                <input type="file" class="imagesInput" id="imageUn" name="imageUn" accept="image/png" required/>
            </div>
            <div class="champ">
                <p>Seconde image du produit</p>
                <input type="file" class="imagesInput" id="imageDeux" name="imageDeux" accept="image/png" required/>
            </div>
        </div>
        <div class="boutonsConfirmationEtAnnulation">
            <button type="button" class="boutonConfirmationPopup" onclick="window.location.href='./pageAdmin.php'">
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

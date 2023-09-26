<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require_once '../controllers/ProduitController.php';
    $produitController = new ProduitController($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <!-- Incluez vos feuilles de style CSS ici -->
    <link rel="stylesheet" href="votre-style.css">
</head>
<body>
    <h1>Ajouter un produit</h1>
    <form action="traitement-ajout-produit.php" method="post" enctype="multipart/form-data">
        <!-- Champ pour le nom du produit -->
        <label for="nomProduit">Nom du produit :</label>
        <input type="text" id="nomProduit" name="nomProduit" required>
        
        <!-- Champ pour le prix du produit -->
        <label for="prixProduit">Prix du produit :</label>
        <input type="number" id="prixProduit" name="prixProduit" required>
        
        <!-- Champ pour la description du produit -->
        <label for="descriptionProduit">Description du produit :</label>
        <textarea id="descriptionProduit" name="descriptionProduit" rows="4" required></textarea>
        
        <!-- Champ pour la marque du produit -->
        <label for="marqueProduit">Marque du produit :</label>
        <input type="text" id="marqueProduit" name="marqueProduit" required>
        
        <!-- Champ pour la réduction du produit -->
        <label for="reductionProduit">Réduction du produit :</label>
        <input type="number" id="reductionProduit" name="reductionProduit">
        
        <!-- Champ pour la couleur du produit -->
        <label for="couleurProduit"> Type de sexe du produit</label>
        <input type="number" id="couleurProduit" name="couleurProduit">
        
        <!-- Champ pour la taille du produit -->
        <label for="tailleProduit">Afficher le produit :</label>
        <input type="boolean" id="tailleProduit" name="tailleProduit">
        
        <!-- Champ pour le type du produit -->
        <label for="typeProduit">Type du produit :</label>
        <input type="text" id="typeProduit" name="typeProduit">
        
        <!-- Champ pour la première image du produit -->
        <label for="imageProduit">Image du produit (1) :</label>
        <input type="file" id="imageProduit" name="imageProduit" accept="image/*">
        
        <!-- Champ pour la deuxième image du produit -->
        <label for="imageProduit2">Image du produit (2) :</label>
        <input type="file" id="imageProduit2" name="imageProduit2" accept="image/*">
        
        <!-- Bouton de soumission du formulaire -->
        <button type="submit">Ajouter le produit</button>
    </form>
</body>
</html>

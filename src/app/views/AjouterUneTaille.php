<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../controllers/ProduitController.php';
$produitController = new ProduitController($mysqli);
$tailles = $produitController->afficherListeDesTaille();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Taille</title>
</head>
<body>
    <h1>Ajouter une Taille</h1>
    <!-- Formulaire pour ajouter une nouvelle taille -->
    <form action="traitement-ajout-taille.php" method="post">
        <label for="nomTaille">Nom de la Taille :</label>
        <input type="text" id="nomTaille" name="nomTaille" required>
        
        <button type="submit">Ajouter la Taille</button>
    </form>
    
    <!-- Liste des tailles existantes -->
    <h2>Liste des Tailles Existantes</h2>
    <ul>
    <?php foreach ($tailles as $taille): ?>
        <form action="traitement-supp-taille.php" method="post">
            <input type="hidden" name="nomTaille" value="<?php echo $taille->taille; ?>">
            <li><?php echo $taille->taille; ?><button type="submit"> - </button></li>
        </form>
    <?php endforeach; ?>
</ul>

    <button><a href="pageAdmin.php">RETOUR</a></button>
</body>
</html>

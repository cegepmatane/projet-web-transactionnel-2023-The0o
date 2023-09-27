<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../controllers/ProduitController.php';
$produitController = new ProduitController($mysqli);

// Si un formulaire a été soumis pour ajouter une couleur
if (isset($_POST['ajouterCouleur'])) {
    $nomCouleur = $_POST['nomCouleur'];
    $hexaCouleur = $_POST['hexaCouleur'];
    $produitController->ajouterUneCouleur($nomCouleur, $hexaCouleur);
}

// Récupérer la liste des couleurs existantes
$couleurs = $produitController->afficherListeDesCouleurs();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une couleur</title>
</head>
<body>
    <h1>Ajouter une couleur</h1>
    
    <!-- Formulaire pour ajouter une nouvelle couleur -->
    <form action="" method="post">
        <label for="nomCouleur">Nom de la couleur :</label>
        <input type="text" id="nomCouleur" name="nomCouleur" required>
        
        <label for="hexaCouleur">Code hexadécimal de la couleur :</label>
        <input type="text" id="hexaCouleur" name="hexaCouleur" required>
        
        <button type="submit" name="ajouterCouleur">Ajouter la couleur</button>
    </form>
    
    <!-- Liste des couleurs existantes -->
    <h2>Liste des couleurs existantes :</h2>
    <ul>
        <?php foreach ($couleurs as $couleur): ?>
            <li><?php echo $couleur->nomCouleur; ?> (#<?php echo $couleur->hexaCouleur; ?>)</li>
        <?php endforeach; ?>
    </ul>
    <button><a href="pageAdmin.php">RETOUR</a></button>
</body>
</html>

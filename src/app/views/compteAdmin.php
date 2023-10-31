<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
require_once('../models/Utilisateur.php');
require_once('../controllers/UtilisateurController.php');
$utilisateurController = new UtilisateurController($mysqli);
session_start();
$utilisateurs = $utilisateurController->tousUtilisateur();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['nom'] as $id => $nom) {
        $prenom = $_POST['prenom'][$id];
        $email = $_POST['email'][$id];
        $adresse = $_POST['adresse'][$id];
        $utilisateurController->modificationUtilisateur($email, $nom, $prenom, $adresse);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/navBar.css">
    <link rel="stylesheet" href="../public/css/compteAdmin.css">
    <title>Compte ADMIN</title>
</head>
<body>

    <div id="navBar">
        <div id="logo">
                    WIREFIT
        </div>
        <div id="naviguerCategories">
            <a href="./pageAdmin.php" class="aucuneDecoration">Produits</a>
            <a href="./AdministrationClient.php" class="aucuneDecoration">Clients</a>
        </div>
        <div id="imageDefilerMenu">
            <img src="../img/menu.svg" alt="Menu déroulant">
        </div>
    </div>
    
    <form method="post">
        <?php
        foreach ($utilisateurs as $utilisateur) {
            $id = $utilisateur->getEmail();
        ?>
        <div id="champ">
            <div>
                <p>Nom :</p>
                <input type="text" name="nom[<?php echo $id ?>]" value="<?php echo $utilisateur->getNom() ?>">
            </div>
            <div>
                <p>Prénom :</p>
                <input type="text" name="prenom[<?php echo $id ?>]" value="<?php echo $utilisateur->getPrenom() ?>">
            </div>
            <div>
                <p>Email :</p>
                <input type="text" name="email[<?php echo $id ?>]" value="<?php echo $utilisateur->getEmail() ?>">
            </div>
            <div>
                <p>Adresse :</p>
                <input type="text" name="adresse[<?php echo $id ?>]" value="<?php echo $utilisateur->getAdresse() ?>">
            </div>
        </div>

        <?php
        }
        ?>

        <input type="submit" value="Sauvegarder">
    </form>

</body>
</html>
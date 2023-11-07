<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
require_once('../models/Utilisateur.php');
require_once('../controllers/UtilisateurController.php');
$utilisateurController = new UtilisateurController($mysqli);
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ConnexionAdmin.php');
}
$utilisateurs = $utilisateurController->tousUtilisateur();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['nom'] as $id => $nom) {
        $prenom = $_POST['prenom'][$id];
        $email = $_POST['email'][$id];
        $adresse = $_POST['adresse'][$id];
        $utilisateurController->modificationUtilisateur($email, $nom, $prenom, $adresse);
    }
    $utilisateurs = $utilisateurController->tousUtilisateur();
}
?>

<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">    <title></title>
    <link rel="stylesheet" href="../public/css/administrationClient.css">
    <link rel="stylesheet" href="../public/css/navBar.css">
  </head>
  <body>
    <div id="navBar">
      <div id="logo" onclick="window.location.replace('Accueil.php')">
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
    <div id="mainPage">
        <div id="introClient">
            <p class="texteGrosGras">Compte client</p>
            <div id="addClient">
                <p>Ajouter un client</p>
                <p>+</p>
            </div>
        </div>
        <form method="post">
            <div id="tableauClient">
                <div id="headerTableau" class="row">
                    <p>Nom</p>
                    <p>Prénom</p>
                    <p>Email</p>
                    <p>Adresse</p>
                    <p id="actionHeader">Action</p>
                </div>

                <?php
                foreach ($utilisateurs as $utilisateur) {
                    $id = $utilisateur->getEmail();
                ?>

                <div class="row">
                    <input type="text" name="nom[<?php echo $id ?>]" value="<?php echo $utilisateur->getNom() ?>">
                    <input type="text" name="prenom[<?php echo $id ?>]" value="<?php echo $utilisateur->getPrenom() ?>">
                    <input type="text" name="email[<?php echo $id ?>]" value="<?php echo $utilisateur->getEmail() ?>">
                    <input type="text" name="adresse[<?php echo $id ?>]" value="<?php echo $utilisateur->getAdresse() ?>">
                    <div class="listeActions">
                    <div class="imageAction">
                        <img src="../public/img/crayonModifier.svg" alt="">
                        <img src="../public/img/poubelleSupprimer.svg" alt="">
                    </div>
                    </div>
                </div>

                <?php
                }
                ?>
            </div>
            <div id="save-button">
                <input type="submit" value="Sauvegarder">
            </div>
        </form>
    </div>
  </body>
</html>

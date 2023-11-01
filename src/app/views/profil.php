<?php
// Vérifier si l'utilisateur est connecté
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../models/Utilisateur.php');
require_once('../controllers/UtilisateurController.php');
session_start();
$utilisateurController = new UtilisateurController($mysqli);
$utilisateurObjet = $_SESSION['utilisateur'];
$emailUtilisateur = $utilisateurObjet->getEmail();
$nomUtilisateur = $utilisateurObjet->getNom();
$prenomUtilisateur = $utilisateurObjet->getPrenom();
$adresseUtilisateur = $utilisateurObjet->getAdresse();
//si le formulaire est envoyer
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailUtilisateur = $_POST['email'];
    $nomUtilisateur = $_POST['first_name'];
    $prenomUtilisateur = $_POST['last_name'];
    $adresseUtilisateur = $_POST['address'];
    $ModifiactionUtilisateur =  $utilisateurController->modificationUtilisateur($emailUtilisateur, $nomUtilisateur, $prenomUtilisateur, $adresseUtilisateur);
    $_SESSION['utilisateur']->setEmail($emailUtilisateur);
    $_SESSION['utilisateur']->setNom($nomUtilisateur);
    $_SESSION['utilisateur']->setPrenom($prenomUtilisateur);
    $_SESSION['utilisateur']->setAdresse($adresseUtilisateur);
    if(isset($_POST['newpassword']) && !empty($_POST['newpassword'])){
        $passwordUtilisateur = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $passwordUtilisateur = $utilisateurController->modificationMotDePasse($emailUtilisateur, $passwordUtilisateur, $newpassword);
    }  
}

if(isset($_POST['deconnexion'])) {
    session_unset();
    session_destroy();
    header('Location: ./connexion.php');
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WIREFIT - Profil</title>
    <link rel="stylesheet" type="text/css" href="../public/css/profil.css" />
    <link rel="stylesheet" type="text/css" href="../public/css/navBar.css" />
</head>

<body>
<div id="navBar">
      <a href="../public/index.php" id="aLien" class="aucuneDecoration">
        <div id="logo">
          WIREFIT
        </div>
      </a>
      <div id="naviguerCategories">
        <a href="../views/ListeProduit.php" class="aucuneDecoration">Homme</a>
        <a href="../views/ListeProduit.php" class="aucuneDecoration">Femme</a>
        <a href="../views/ListeProduit.php" class="aucuneDecoration">Enfant</a>
      </div>
      <div id="imageDefilerMenu">
        <img src="../public/img/menu.svg" alt="Menu déroulant">
      </div>
    </div>

    <div id="body-content">
        <div id="titre">
            Profil
        </div>
        <div id="champs">
            <div id="champs-profil">
                <div id="nom-prenom">
                    <div class="champ">
                        <p>Nom</p>
                        <input type="text" id="first_name" name="first_name" value="<?php echo $nomUtilisateur?>" readonly>
                    </div>
                    <div class="champ" id="prenom">
                        <p>Prénom</p>
                        <input type="text" id="last_name" name="last_name" value="<?php echo $prenomUtilisateur ?>" readonly>
                    </div>
                </div>
                <div id="mail">
                    <div class="champ">
                        <p>Adresse mail</p>
                        <input type="email" id="email" name="email" value="<?php echo $emailUtilisateur ?>" readonly>
                    </div>
                </div>
                <div id="adresse">
                    <div class="champ">
                        <p>Adresse</p>
                        <input type="text" id="address" name="address" value="<?php echo $adresseUtilisateur?>" readonly>
                    </div>
                </div>
                <div id="code-postal-ville">
                    <div class="champ">
                        <p>Mot de passe actuelle</p>
                        <input type="password" id="password" name="password" value="<?php ?>" readonly>
                    </div>
                    <div class="champ" id="ville">
                        <p>Nouveau mot de passe</p>
                        <input type="newpassword" id="newpassword" name="newpassword" value="<?php ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div id="editer-profil">
            <a href="./editerProfil.php">
                <input type="button" value="Editer le profil">
            </a>
            <form method="post">
                <input type="submit" name="deconnexion" value="Déconnexion">
            </form>
        </div>
    </div>
</body>

</html>
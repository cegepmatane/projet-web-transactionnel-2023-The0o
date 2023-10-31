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
        if(isset($_POST['password']) && !empty($_POST['password'])){
            $passwordUtilisateur = $_POST['password'];
            $passwordUtilisateur = $utilisateurController->modificationMotDePasse($emailUtilisateur, $passwordUtilisateur);
        }
        header('Location: ./profil.php');
    }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WIREFIT - Profil</title>
    <link rel="stylesheet" type="text/css" href="../public/css/editerProfil.css" />
    <link rel="stylesheet" type="text/css" href="../public/css/navBar.css" />
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

    <div id="body-content">
        <div id="titre">
            Profil
        </div>
        <form method="post">
            <div id="champs">
                <div id="champs-profil">
                    <div id="nom-prenom">
                        <div class="champ">
                            <p>Nom</p>
                            <input type="text" id="first_name" name="first_name" value="<?php echo $nomUtilisateur?>" required>
                        </div>
                        <div class="champ" id="prenom">
                            <p>Prénom</p>
                            <input type="text" id="last_name" name="last_name" value="<?php echo $prenomUtilisateur ?>" required>
                        </div>
                    </div>
                    <div id="mail">
                        <div class="champ">
                            <p>Adresse mail</p>
                            <input type="email" id="email" name="email" value="<?php echo $emailUtilisateur ?>" required>
                        </div>
                    </div>
                    <div id="adresse">
                        <div class="champ">
                            <p>Adresse</p>
                            <input type="text" id="address" name="address" value="<?php echo $adresseUtilisateur?>">
                        </div>
                    </div>
                    <div id="code-postal-ville">
                        <div class="champ">
                            <p>Mot de passe actuelle</p>
                            <input type="password" id="password" name="password" value="<?php ?>" >
                        </div>
                        <div class="champ" id="ville">
                            <p>Nouveau mot de passe</p>
                            <input type="password" id="password" name="password" value="<?php ?>" >
                        </div>
                    </div>
                </div>
            </div>
            <div id="editer-profil">
                <input id="save" type="submit" value="Sauvegarder">
                <a href="./profil.php">
                    <input type="button" value="Annuler">
                </a>
            </div>
        </form>
    </div>
</body>

</html>
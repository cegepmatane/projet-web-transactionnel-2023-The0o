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
        
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil utilisateur</title>
</head>
<body>
    <h1>Profil utilisateur</h1>
    <form method="post">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?php echo $emailUtilisateur ?>" required><br>

        <label for="first_name">Prénom :</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $nomUtilisateur?>" required><br>

        <label for="last_name">Nom :</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $prenomUtilisateur ?>" required><br>

        <label for="address">Adresse :</label>
        <input type="text" id="address" name="address" value="<?php echo $adresseUtilisateur?>"><br>

        <label for="password">Mot de passe Actuelle :</label>
        <input type="password" id="password" name="password" value="<?php ?>" ><br>
        
        <label for="password">Nouveau mot de passe :</label>
        <input type="password" id="password" name="password" value="<?php ?>" ><br>

        <input type="submit" value="Enregistrer les modifications">
    </form>
</body>
</html>

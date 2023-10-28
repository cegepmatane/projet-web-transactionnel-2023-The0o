<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../controllers/UtilisateurController.php';
$utilisateurController = new UtilisateurController($mysqli);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mot_de_passe = $_POST["mot_de_passe"];
    $adresse_mail = $_POST["adresse_mail"];
    if (!empty($nom) && !empty($prenom) && !empty($mot_de_passe) && !empty($adresse_mail)) {
        $utilisateurs = $utilisateurController->creeUtilisateur($nom,$prenom, $adresse_mail, $mot_de_passe);
        echo $utilisateurs;
    } else {
        $erreur = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Créer un compte</title>
</head>
<body>
    <h1>Créer un compte</h1>
    <?php if (isset($erreur)) { ?>
        <p style="color: red;"><?php echo $erreur; ?></p>
    <?php } ?>
    <form method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom"><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom"><br>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe"><br>

        <label for="adresse_mail">Adresse mail :</label>
        <input type="email" name="adresse_mail" id="adresse_mail"><br>

        <input type="submit" value="Créer un compte">
    </form>
</body>
</html>

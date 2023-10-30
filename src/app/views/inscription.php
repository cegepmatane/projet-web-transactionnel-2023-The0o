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
    } else {
        $erreur = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/inscription.css">
    <title>WIREFIT</title>
</head>
<body>
    <div id="body-contenu">
        <div id="titre">WIREFIT</div>
        <div id="log-sub-option">
            <a href="./connexion.php">
                <div id="connexion-box">
                    <p>Connexion</p>
                </div>
            </a>
            <a href="./inscription.php">
                <div id="inscription-box">
                    <p>Inscription</p>
                </div>
            </a>
        </div>
        <?php if (isset($erreur)) { ?>
        <p style="color: red;"><?php echo $erreur; ?></p>
        <?php } ?>
        <form method="post">
            <div id="form">
                <div id="champs">
                    <div class="champ">
                        <p>Nom *</p>
                        <input type="text" name="nom" id="nom" required>
                    </div>
                    <div class="champ">
                        <p>Prénom *</p>
                        <input type="text" name="prenom" id="prenom" required>
                    </div>
                    <div class="champ">
                        <p>Email *</p>
                        <input type="email" name="adresse_mail" id="adresse_mail" required>
                    </div>
                    <div class="champ">
                        <p>Mot de passe *</p>
                        <input type="password" name="mot_de_passe" id="mot_de_passe" required>
                    </div>
                </div>
            </div>
            <div id="connexion">
                <input type="submit" value="Inscription">
            </div>
        </form>
    </div>
</body>
</html>
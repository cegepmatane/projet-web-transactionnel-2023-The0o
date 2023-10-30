<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../controllers/UtilisateurController.php';
$utilisateurController = new UtilisateurController($mysqli);
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $utilisateurs = $utilisateurController->connexionUtilisateur($email, $password);
    if ($utilisateurs !== false) {
        foreach ($utilisateurs as $utilisateur) {
            //var_dump($utilisateur);
        }
        $_SESSION['utilisateur'] = $utilisateurs;
        echo 'Vous êtes connecté';
        echo 'test';
        var_dump($_SESSION['utilisateur']);
        if(isset($_SESSION['utilisateur'])){
            header('Location: ../public/index.php');
        }

       // header('Location: ../public/index.php');
    } else {
        $error = 'identifiants incorrecte';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/connexion.css">
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
        <?php if (isset($error)): ?>
        <div><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <div id="form">
                <div id="champs">
                    <div class="champ">
                        <p>Email *</p>
                        <input type="email" name="email" required>
                    </div>
                    <div class="champ">
                        <p>Mot de passe *</p>
                        <input type="password" name="password" required>
                    </div>
                </div>
            </div>
            <div id="connexion">
                <input type="submit" value="Connexion">
            </div>
        </form>
    </div>
</body>
</html>
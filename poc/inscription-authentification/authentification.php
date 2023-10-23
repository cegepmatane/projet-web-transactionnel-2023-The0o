<!DOCTYPE html>
<html>
    <body>
        <?php
        session_start();

        if (isset($_POST['connexion'])) {
            //si l'utilisateur appuie sur le bouton 'Connecter', on remplit le cookie
            $_SESSION['utilisateur_connecte'] = "nom utilisateur";
        }
        if (isset($_POST['deconnexion'])) {
            //si l'utilisateur appuie sur le bouton 'Se deconnecter', on vide le cookie
            $_SESSION['utilisateur_connecte'] = null;
        }

        if (isset($_SESSION['utilisateur_connecte'])) {
            //on regarde dans les cookies si le cookie 'utilisateur_connecte' existe.
            //Si il existe, c'est que l'utilisateur est deja connecte

            //on peut donc afficher la page comme quoi il est connecté
            $nom_utilisateur = $_SESSION['utilisateur_connecte'];
            echo "Bienvenue, ".$nom_utilisateur." ! Vous êtes connecté.";
            echo '<form method="post"><input type="submit" name="deconnexion" value="Se déconnecter"></form>';
        } else {
            //il n'est pas connecté, on affiche les donnees pour que l'utilisateur se connecte
            echo "Vous n'êtes pas connecté.";
            echo '<form method="post"><input type="submit" name="connexion" value="Se connecter"></form>';
        }
        ?>
    </body>
</html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../includes/Exception.php');
require_once('../includes/PHPMailer.php');
require_once('../includes/SMTP.php');
require_once '../controllers/UtilisateurController.php';
$utilisateurController = new UtilisateurController($mysqli);
$mail = new PHPMailer(true);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mot_de_passe = $_POST["mot_de_passe"];
    $adresse_mail = $_POST["adresse_mail"];
    if (!empty($nom) && !empty($prenom) && !empty($mot_de_passe) && !empty($adresse_mail)) {
        $utilisateurs = $utilisateurController->creeUtilisateur($nom,$prenom, $adresse_mail, $mot_de_passe);
        try{
            $mail->isSMTP();
            $mail->Host = 'smtp-mail.outlook.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "tls";
            $mail->Port = 587; 
            $mail->Username = 'totoleschamps@outlook.fr';
            $mail->Password = 'Lolita5300';
        
            $mail->setFrom('totoleschamps@outlook.fr'); //adresse mail de l'expéditeur
            $mail->addAddress($adresse_mail); //adresse mail du destinataire
            $mail->isHTML(true); //mail au format HTML
            $mail->Subject = 'Confirmation de ton inscription !'; //sujet du mail
            $mail->Body = 'Vous êtes désormais inscrit à WIREFIT !';
            $mail->send();
            header('Location: connexion.php');
        } catch(Exception) {
            echo 'Votre mail est non valide';
        }
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


<style>

.svg-container{
height: 100%;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}
        .loader {
            position: fixed;
            z-index: 999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <script>

 document.addEventListener('DOMContentLoaded', function() {
        // Votre code ici
        var connexionElement = document.getElementById('inscription');
        if (connexionElement) {
            connexionElement.addEventListener('submit', function() {
                hideLoader();
            });
        }
    });


        function hideLoader() {
            const loader = document.querySelector(".loader");
            loader.style.display = "block";
        }
    </script>





<body>
<div class="loader" style="display : none">
<div class="svg-container">
<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100" overflow="visible" fill="#ffffff" stroke="none"><defs><circle id="loader" cx="20" cy="50" r="6" /></defs><use xlink:href="#loader" x="18"><animate attributeName="opacity" values="0;1;0" dur="1s" begin="0.20s" repeatCount="indefinite"></animate></use><use xlink:href="#loader" x="34"><animate attributeName="opacity" values="0;1;0" dur="1s" begin="0.40s" repeatCount="indefinite"></animate></use><use xlink:href="#loader" x="50"><animate attributeName="opacity" values="0;1;0" dur="1s" begin="0.60s" repeatCount="indefinite"></animate></use><use xlink:href="#loader" x="66"><animate attributeName="opacity" values="0;1;0" dur="1s" begin="0.80s" repeatCount="indefinite"></animate></use><use xlink:href="#loader" x="82"><animate attributeName="opacity" values="0;1;0" dur="1s" begin="1.00s" repeatCount="indefinite"></animate></use></svg>
</div>
</div>
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
        <form id="inscription" method="post">
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

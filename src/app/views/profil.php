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
        <div id="champs">
            <div class="champ" id="image-profil">
                <img src="../public/img/womanOutfit.jpg" alt="">
            </div>
            <div id="champs-profil">
                <div id="nom-prenom">
                    <div class="champ">
                        <p>Nom</p>
                        <input type="text" readonly>
                    </div>
                    <div class="champ" id="prenom">
                        <p>Prénom</p>
                        <input type="text" readonly>
                    </div>
                </div>
                <div id="mail">
                    <div class="champ">
                        <p>Addresse mail</p>
                        <input type="text" readonly>
                    </div>
                </div>
                <div id="adresse">
                    <div class="champ">
                        <p>Addresse</p>
                        <input type="text" readonly>
                    </div>
                </div>
                <div id="code-postal-ville">
                    <div class="champ">
                        <p>Code postal</p>
                        <input type="text" readonly>
                    </div>
                    <div class="champ" id="ville">
                        <p>Ville</p>
                        <input type="text" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div id="editer-profil">
            <a href="./editerProfil.php">
                <input type="button" value="Editer le profil">
            </a>
        </div>
    </div>
</body>

</html>
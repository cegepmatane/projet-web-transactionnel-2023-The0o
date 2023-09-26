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
        <div id="tableauClient">
            <div id="headerTableau" class="row">
                <p>Nom</p>
                <p>Email</p>
                <p>Age</p>
                <p id="actionHeader">Action</p>
            </div>
            <div class="row">
                <p>Nom</p>
                <p>Email</p>
                <p>Age</p>
                <div class="listeActions">
                  <div class="imageAction">
                    <img src="../public/img/crayonModifier.svg" alt="">
                    <img src="../public/img/poubelleSupprimer.svg" alt="">
                  </div>
                </div>
            </div>
            <div class="row">
                <p>Nom</p>
                <p>Email</p>
                <p>Age</p>
                <div class="listeActions">
                  <div class="imageAction">
                    <img src="../public/img/crayonModifier.svg" alt="">
                    <img src="../public/img/poubelleSupprimer.svg" alt="">
                  </div>
                </div>
            </div>
            <div class="row">
              <p>Nom</p>
                <p>Email</p>
                <p>Age</p>
                <div class="listeActions">
                  <div class="imageAction">
                    <img src="../public/img/crayonModifier.svg" alt="">
                    <img src="../public/img/poubelleSupprimer.svg" alt="">
                  </div>
                </div>
            </div>
            <div class="row">
              <p>Nom</p>
                <p>Email</p>
                <p>Age</p>
                <div class="listeActions">
                  <div class="imageAction">
                    <img src="../public/img/crayonModifier.svg" alt="">
                    <img src="../public/img/poubelleSupprimer.svg" alt="">
                  </div>
                </div>
            </div>
            <div class="row">
              <p>Nom</p>
                <p>Email</p>
                <p>Age</p>
                <div class="listeActions">
                  <div class="imageAction">
                    <img src="../public/img/crayonModifier.svg" alt="">
                    <img src="../public/img/poubelleSupprimer.svg" alt="">
                  </div>
                </div>
            </div>
            <div class="row">
              <p>Nom</p>
                <p>Email</p>
                <p>Age</p>
                <div class="listeActions">
                  <div class="imageAction">
                    <img src="../public/img/crayonModifier.svg" alt="">
                    <img src="../public/img/poubelleSupprimer.svg" alt="">
                  </div>
                </div>
            </div>
            <div class="row">
              <p>Nom</p>
                <p>Email</p>
                <p>Age</p>
                <div class="listeActions">
                  <div class="imageAction">
                    <img src="../public/img/crayonModifier.svg" alt="">
                    <img src="../public/img/poubelleSupprimer.svg" alt="">
                  </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>

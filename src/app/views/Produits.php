<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../controllers/ProduitController.php');
$produitController = new ProduitController($mysqli);
if (isset($_GET['id'])) {
    $idProduit = $_GET['id'];
} else {
    $idProduit = 1;
}
$produits = $produitController->afficherUnProduitParSonId($idProduit);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="../public/css/pageProduit.css" />
    <link rel="stylesheet" type="text/css" href="../public/css/navBar.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="../public/js/slider_pageProduit.js"></script>
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
        <img src="../img/menu.svg" alt="Menu déroulant">
      </div>
    </div>
    <div class="body">
        <div class="article">
            <div id="images">
                <img id="image" src="../img/airMax270.png" alt="image1">
                <div id="precedent" onclick="changeImage(-1)">
                <?php
                    $imageBase64 = base64_encode($produits->imagesProduit);
                    $imageType = 'image/png';
                    $imageDataUrl = 'data:' . $imageType . ';base64,' . $imageBase64;
                ?>
                    <img src="<?php echo $imageDataUrl; ?>" alt="image1">
                </div>
                <div id="suivant" onclick="changeImage(1)">
                <?php
                    $imageBase642 = base64_encode($produits->imagesDeuxProduit);
                    $imageType2 = 'image/png';
                    $imageDataUrl2 = 'data:' . $imageType2 . ';base64,' . $imageBase642;
                ?>
                    <img src="<?php echo $imageDataUrl2; ?>" alt="image2">
                </div>
            </div>
            <div class="informations">
                <p class="titre"><?php echo $produits->nomProduit?></p>
                <p class="gamme"><?php echo $produits->sousTitreProduit?></p>
                <p class="marque"><?php echo $produits->marqueProduit?></p><br>
                <p class="prix"><?php echo $produits->prixProduit?> $</p><br>
                <p class="description"><?php echo $produits->descriptionProduit?>
                </p><br>

                <div class="personnalisation">
                    <div class="filtre">
                      <div class="filtreTitre" onclick="showFilter('filtreTaille')">
                        <p>Tailles</p>
                        <img src="../public/img/fleche.svg" alt="fleche vers le bas">  
                      </div>
                      <div class="optionsFiltre" id="filtreTaille">
                        <hr>
                        <ul>
                          <div class="optionFiltre">
                            <p>36</p>
                            <input type="checkbox" onchange="tailleChange(this)">
                          </div>
                          <div class="optionFiltre">
                            <p>37</p>
                            <input type="checkbox" onchange="tailleChange(this)">
                          </div>
                          <div class="optionFiltre">
                            <p>38</p>
                            <input type="checkbox" onchange="tailleChange(this)">
                          </div>
                          <div class="optionFiltre">
                            <p>39</p>
                            <input type="checkbox" onchange="tailleChange(this)">
                          </div>
                          <div class="optionFiltre">
                            <p>40</p>
                            <input type="checkbox" onchange="tailleChange(this)">
                          </div>
                        </ul>
                      </div>
                    </div>
                    <div class="filtre">
                      <div class="filtreTitre" onclick="showFilter('filtreCouleur')"">
                        <p>Couleurs</p>
                        <img src="../public/img/fleche.svg" alt="fleche vers le bas">  
                      </div>
                      <div class="optionsFiltre" id="filtreCouleur">
                        <hr>
                        <ul>
                          <div class="optionFiltre">
                            <p>Blanc</p>
                            <input type="checkbox" onchange="couleurChange(this)">
                          </div>
                          <div class="optionFiltre">
                            <p>Noir</p>
                            <input type="checkbox" onchange="couleurChange(this)">
                          </div>
                          <div class="optionFiltre">
                            <p>Gris</p>
                            <input type="checkbox" onchange="couleurChange(this)">
                          </div>
                          <div class="optionFiltre">
                            <p>Rouge</p>
                            <input type="checkbox" onchange="couleurChange(this)">
                          </div>
                          <div class="optionFiltre">
                            <p>Bleu</p>
                            <input type="checkbox" onchange="couleurChange(this)">
                          </div>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showFilter(id) {
          if (document.getElementById(id).style.display !== "block") {
            document.getElementById(id).style.display = "block"
          }
          else {
            document.getElementById(id).style.display = "none"
          }
        }
    
        function tailleChange(element) {
          document.cookie = "taille=" + element.parentElement.children[0].textContent
        }
    
        function couleurChange(element) {
          document.cookie = "couleur=" + element.parentElement.children[0].textContent
        }
        
      </script>
</body>

</html>

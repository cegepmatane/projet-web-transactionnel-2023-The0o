<?php
require_once('../controllers/ProduitController.php');
$produitController = new ProduitController($mysqli);
$produits = $produitController->afficherTousLesProduits();
?>
<!DOCTYPE html>
<html lang="FR">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">    <title></title>
    <link rel="stylesheet" href="../public/css/listeProduit.css">
    <link rel="stylesheet" href="../public/css/navBar.css">
  </head>
  <body>
    <div id="navBar">
      <a href="../public/index.php" id="aLien">
      <div id="logo">
        WIREFIT
        </div>
        </a>
      <div id="naviguerCategories">
        <a href="../views/ListeProduit.php">Homme</a>
        <a href="../views/ListeProduit.php">Femme</a>
        <a href="../views/ListeProduit.php">Enfant</a>
      </div>
      </div>
      <div id="imageDefilerMenu">
        <img src="../public/img/menu.svg" alt="Menu déroulant">
      </div>
    </div>

    <div id="titreEtFiltre">
    <div id="listeFiltre">
        <div class="filtre">
          <div class="filtreTitre" onclick="showFilter('tri')">
            <p>Tri</p>
            <img src="../img/fleche.svg" alt="fleche vers le bas">  
          </div>
          <div class="optionsFiltre" id="tri">
            <hr>
            <ul>
              <li onclick="triChange(this)">Nombre de produit vendus</li>
              <hr class="separationEntreOption">
              <li onclick="triChange(this)">Prix ascendant</li>
              <hr class="separationEntreOption">
              <li onclick="triChange(this)">Prix descendant</li>
              <hr class="separationEntreOption">
              <li onclick="triChange(this)">Nouveauté</li>
            </ul>
          </div>
        </div>
        <div class="filtre">
          <div class="filtreTitre" onclick="showFilter('filtrePrix')">
            <p>Prix</p>
            <img src="../img/fleche.svg" alt="fleche vers le bas">  
          </div>
          <div class="optionsFiltre" id="filtrePrix">
            <hr>
            <ul>
              <div class="optionFiltre">
                <p>0€-10€</p>
                <input type="checkbox" onchange="prixChange(this)">
              </div>
              <div class="optionFiltre">
                <p>10€-20€</p>
                <input type="checkbox" onchange="prixChange(this)">
              </div>
              <div class="optionFiltre">
                <p>20€-40€</p>
                <input type="checkbox" onchange="prixChange(this)">
              </div>
              <div class="optionFiltre">
                <p>40€-60€</p>
                <input type="checkbox" onchange="prixChange(this)">
              </div>
              <div class="optionFiltre">
                <p>+60€</p>
                <input type="checkbox" onchange="prixChange(this)">
              </div>
            </ul>
          </div>
        </div>
        <div class="filtre">
          <div class="filtreTitre" onclick="showFilter('filtreTaille')">
            <p>Tailles</p>
            <img src="../img/fleche.svg" alt="fleche vers le bas">  
          </div>
          <div class="optionsFiltre" id="filtreTaille">
            <hr>
            <ul>
              <div class="optionFiltre">
                <p>XS</p>
                <input type="checkbox" onchange="tailleChange(this)">
              </div>
              <div class="optionFiltre">
                <p>S</p>
                <input type="checkbox" onchange="tailleChange(this)">
              </div>
              <div class="optionFiltre">
                <p>M</p>
                <input type="checkbox" onchange="tailleChange(this)">
              </div>
              <div class="optionFiltre">
                <p>L</p>
                <input type="checkbox" onchange="tailleChange(this)">
              </div>
              <div class="optionFiltre">
                <p>XL</p>
                <input type="checkbox" onchange="tailleChange(this)">
              </div>
            </ul>
          </div>
        </div>
        <div class="filtre">
          <div class="filtreTitre" onclick="showFilter('filtreCouleur')"">
            <p>Couleurs</p>
            <img src="../img/fleche.svg" alt="fleche vers le bas">  
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
        <div class="filtre">
          <div class="filtreTitre" onclick="showFilter('filtreType')">
            <p>Type</p>
            <img src="../img/fleche.svg" alt="fleche vers le bas">  
          </div>
          <div class="optionsFiltre" id="filtreType">
            <hr>
            <ul>
              <div class="optionFiltre">
                <p>Pantalon</p>
                <input type="checkbox" onchange="typeChange(this)">
              </div>
              <div class="optionFiltre">
                <p>T-shirt</p>
                <input type="checkbox" onchange="typeChange(this)">
              </div>
              <div class="optionFiltre">
                <p>Chausette</p>
                <input type="checkbox" onchange="typeChange(this)">
              </div>
              <div class="optionFiltre">
                <p>Chaussure</p>
                <input type="checkbox" onchange="typeChange(this)">
              </div>
              <div class="optionFiltre">
                <p>Bob</p>
                <input type="checkbox" onchange="typeChange(this)">
              </div>
            </ul>
          </div>
        </div>
        <div class="filtre">
          <div class="filtreTitre" onclick="showFilter('filtreReduction')"">
            <p>Réduction</p>
            <img src="../img/fleche.svg" alt="fleche vers le bas">  
          </div>
          <div class="optionsFiltre" id="filtreReduction">
            <hr>
            <ul>
              <div class="optionFiltre">
                <p>5%</p>
                <input type="checkbox" onchange="reductionChange(this)">
              </div>
              <div class="optionFiltre">
                <p>10%</p>
                <input type="checkbox" onchange="reductionChange(this)">
              </div>
              <div class="optionFiltre">
                <p>15%</p>
                <input type="checkbox" onchange="reductionChange(this)">
              </div>
              <div class="optionFiltre">
                <p>30%</p>
                <input type="checkbox" onchange="reductionChange(this)">
              </div>
              <div class="optionFiltre">
                <p>+30%</p>
                <input type="checkbox" onchange="reductionChange(this)">
              </div>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div id="listeArticles">
    <?php foreach ($produits as $produit): ?>
      <a href="/projet-web-transactionnel-2023-The0o/src/app/views/Produits.php?id=<?php echo $produit->idProduit; ?>">
        <div class="article">
            <div class="previewImageArticle">
            <?php
                    $imageBase642 = base64_encode($produit->imagesProduit);
                    $imageType2 = 'image/png';
                    $imageDataUrl2 = 'data:' . $imageType2 . ';base64,' . $imageBase642;
                ?>
                    <img src="<?php echo $imageDataUrl2; ?>" alt="image2">
          </div>
            <div class="articleNom"><?php echo $produit->nomProduit; ?></div>
            <div class="articleType"><?php echo $produit->marqueProduit; ?></div>
            <div class="articlePrix"><?php echo $produit->prixProduit; ?> $</div>
            <div class="articleCouleur" style="background-color:#<?php echo $produit->couleurProduit;?>;"></div>
        </div>
      </a>
    <?php endforeach; ?>
</div>

  </body>
  <script>
    function showFilter(id) {
      if (document.getElementById(id).style.display !== "block") {
        document.getElementById(id).style.display = "block"
      }
      else {
        document.getElementById(id).style.display = "none"
      }
    }

    function triChange(element) {
      document.cookie = "tri=" + element.textContent
    }

    function prixChange(element) {
      document.cookie = "prix=" + element.parentElement.children[0].textContent
    }

    function tailleChange(element) {
      document.cookie = "taille=" + element.parentElement.children[0].textContent
    }

    function couleurChange(element) {
      document.cookie = "couleur=" + element.parentElement.children[0].textContent
    }

    function typeChange(element) {
      document.cookie = "type=" + element.parentElement.children[0].textContent
    }

    function reductionChange(element) {
      document.cookie = "reduction=" + element.parentElement.children[0].textContent
    }

  </script>
</html>

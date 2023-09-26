<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../controllers/ProduitController.php');
$produitController = new ProduitController($mysqli);
$produits = $produitController->afficherTousLesProduits();
$couleur = $produitController->afficherListeDesCouleurs();
$taille = $produitController->afficherListeDesTaille();
$categorie = $produitController->afficherListeDesCategorie();
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
            <img src="../public/img/fleche.svg" alt="fleche vers le bas">  
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
            <img src="../public/img/fleche.svg" alt="fleche vers le bas">  
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
            <img src="../public/img/fleche.svg" alt="fleche vers le bas">  
          </div>
          <div class="optionsFiltre" id="filtreTaille">
            <hr>
            <ul>
            <?php foreach ($taille as $taille): ?>
              <div class="optionFiltre">
                <p><?php echo $taille->taille; ?></p>
                <input type="checkbox" onchange="tailleChange(this)">
              </div>
              <?php endforeach; ?>
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
            <?php foreach ($couleur as $couleur): ?>
              <div class="optionFiltre">
                <p><?php echo $couleur->nomCouleur ?></p>
                <input type="checkbox" onchange="couleurChange(this)">
              </div>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <div class="filtre">
          <div class="filtreTitre" onclick="showFilter('filtreType')">
            <p>Type</p>
            <img src="../public/img/fleche.svg" alt="fleche vers le bas">  
          </div>
          <div class="optionsFiltre" id="filtreType">
            <hr>
            <ul>
            <?php foreach ($categorie as $categorie): ?>
              <div class="optionFiltre">
                <p><?php echo $categorie->nomCategorie ?></p>
                <input type="checkbox" onchange="typeChange(this)">
              </div>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <div class="filtre">
          <div class="filtreTitre" onclick="showFilter('filtreReduction')"">
            <p>Réduction</p>
            <img src="../public/img/fleche.svg" alt="fleche vers le bas">  
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
            <div class="articleNom"><?php echo  $produit->nomProduit; ?></div>
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

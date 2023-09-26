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
      <a href="../public/index.php">
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
      <div id="titre">
        T-shirt pour homme
      </div>
      <div id="listeFiltre">
        <div class="filtre">
          <p>Tri</p>
          <img src="../public/img/fleche.svg" alt="fleche vers le bas">
        </div>
        <div class="filtre">
          <p>Prix</p>
          <img src="../public/img/fleche.svg" alt="fleche vers le bas">
        </div>
        <div class="filtre">
          <p>Tailles</p>
          <img src="../public/img/fleche.svg" alt="fleche vers le bas">
        </div>
        <div class="filtre">
          <p>Couleurs</p>
          <img src="../public/img/fleche.svg" alt="fleche vers le bas">
        </div>
        <div class="filtre">
          <p>Type</p>
          <img src="../public/img/fleche.svg" alt="fleche vers le bas">
        </div>
        <div class="filtre">
          <p>Réduction</p>
          <img src="../public/img/fleche.svg" alt="fleche vers le bas">
        </div>
      </div>
    </div>

    <div id="listeArticles">
    <?php foreach ($produits as $produit): ?>
      <a href="/projet-web-transactionnel-2023-The0o/src/app/views/Produits.php?id=<?php echo $produit->idProduit; ?>">
        <div class="article">
            <div class="articleNom"><?php echo $produit->nomProduit; ?></div>
            <div class="articleType"><?php echo $produit->marqueProduit; ?></div>
            <div class="articlePrix"><?php echo $produit->prixProduit; ?> $</div>
            <div class="articleCouleur" style="background-color:#<?php echo $produit->couleurProduit;?>;"></div>
        </div>
      </a>
    <?php endforeach; ?>
</div>

  </body>
</html>

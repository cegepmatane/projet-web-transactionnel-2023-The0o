<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/accueil.css">
        <title>Wirefit</title>
    </head>
    <body>
        <div class="container">
            <div class="left-black">
                <div id="title" class="front-white"><p>WIREFIT</p></div>
                <div id="container-image-woman-outfit">
                    <img src="img/womanOutfit.jpg" id="image-woman-outfit"/>
                </div>
                <div class="container-mid-normal-text front-white" >
                    <div class="medium-text front-white">
                        <p>Faite de la mode votre passion !</p>
                    </div>
                    <p class="normal-text front-white">Découvrez notre collection de vêtements alliant style et qualité. Des tenues décontractées aux looks élégants, trouvez votre expression de mode. Rejoignez-nous pour redéfinir votre style sur notre page d'accueil !</p>
                </div>
            </div>
            <div class="right-white">
                <div class="nav-bar">
                    <div class="nav-bar-men nav-menu nav-bar-menu-chose">
                        <p onclick="window.location.replace('listeProduit.html')">HOMME</p>
                    </div>
                    <div class="nav-bar-woman nav-menu">
                        <p onclick="window.location.replace('listeProduit.html')">FEMME</p>
                    </div>
                    <div class="nav-bar-kids nav-menu">
                        <p onclick="window.location.replace('listeProduit.html')">ENFANT</p>
                    </div>
                </div>
               <div class="container-img-men-outfit">
                   <img src="img/menOutfit.png" id="image-men-outfit" />
               </div>
               <div class="container-shop-img">
                <div class="container-shop">
                
                <div id="listeArticles">

                <?php foreach ($produits as $produit): ?>
                    <div class="article" onclick="window.location.replace('pageProduit.html')">
                        <div class="articleNom"><?php echo $produit->nomProduit; ?></div>
                        <div class="articleType"><?php echo $produit->marqueProduit; ?></div>
                        <div class="articlePrix"><?php echo $produit->prixProduit;?></div>
                        <div class="articleCouleur"></div>
                    </div>
                <?php endforeach; ?>
                </div>
               </div>

                <div class="container-img-men-outfit-body">
                   <img src="img/menOutfitBody.png" id="image-men-outfit-body">
                </div>
            </div>
        </div>
    </body>

    <script>

    const menuItems = document.querySelectorAll('.nav-menu');
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            menuItems.forEach(item => {
                item.classList.remove('nav-bar-menu-chose');
            });
            this.classList.add('nav-bar-menu-chose');
        });
    });
</script>

    </html>

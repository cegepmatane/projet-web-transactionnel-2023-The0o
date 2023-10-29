<?php 
session_start();
?>


<!DOCTYPE html>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/accueil.css">
        <title>Wirefit</title>
    </head>
    <body>
        <div class="container">
            <div class="left-black">
                <div id="title" class="front-white"><p>WIREFIT</p></div>
                <div id="container-image-woman-outfit">
                    <img src="../public/img/womanOutfit.jpg" id="image-woman-outfit"/>
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
                    <div class="nav-bar-men nav-menu">
                    <a href="/projet-web-transactionnel-2023-The0o/src/app/views/ListeProduit.php">
                        <p>HOMME</p>
                    </a>
                    </div>
                    <div class="nav-bar-woman nav-menu">
                    <a href="/projet-web-transactionnel-2023-The0o/src/app/views/ListeProduit.php">
                        <p>FEMME</p>
                    </a>
                    </div>
                    <div class="nav-bar-kids nav-menu">
                    <a href="/projet-web-transactionnel-2023-The0o/src/app/views/ListeProduit.php">
                        <p>ENFANT</p>
                    </a>
                    </div>
                    <?php 
                    if(isset($_SESSION['utilisateur'])) {
                        echo '
                        <div class="nav-bar-icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    <path d="M7.00488 8V6C7.00488 4.67392 7.53167 3.40215 8.46935 2.46447C9.40703 1.52678 10.6788 1 12.0049 1C13.331 1 14.6027 1.52678 15.5404 2.46447C16.4781 3.40215 17.0049 4.67392 17.0049 6V8H20.0049C20.2701 8 20.5245 8.10536 20.712 8.29289C20.8995 8.48043 21.0049 8.73478 21.0049 9V21C21.0049 21.2652 20.8995 21.5196 20.712 21.7071C20.5245 21.8946 20.2701 22 20.0049 22H4.00488C3.73967 22 3.48531 21.8946 3.29778 21.7071C3.11024 21.5196 3.00488 21.2652 3.00488 21V9C3.00488 8.73478 3.11024 8.48043 3.29778 8.29289C3.48531 8.10536 3.73967 8 4.00488 8H7.00488ZM7.00488 10H5.00488V20H19.0049V10H17.0049V12H15.0049V10H9.00488V12H7.00488V10ZM9.00488 8H15.0049V6C15.0049 5.20435 14.6888 4.44129 14.1262 3.87868C13.5636 3.31607 12.8005 3 12.0049 3C11.2092 3 10.4462 3.31607 9.88356 3.87868C9.32095 4.44129 9.00488 5.20435 9.00488 6V8Z" fill="black"/>
    </svg></div>
                        <div class="nav-bar-icons">
                            
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="21" viewBox="0 0 19 21" fill="none">
      <path d="M13.6667 12.5833C15.0088 12.5833 16.2991 13.1015 17.2685 14.0298C18.2379 14.958 18.8115 16.2247 18.8698 17.5655L18.875 17.7916V18.8333C18.8752 19.3589 18.6767 19.8651 18.3193 20.2505C17.9619 20.6359 17.472 20.872 16.9479 20.9114L16.7917 20.9166H2.20833C1.68273 20.9168 1.17649 20.7182 0.791096 20.3609C0.405699 20.0035 0.169628 19.5136 0.130208 18.9895L0.125 18.8333V17.7916C0.125078 16.4494 0.643273 15.1591 1.57152 14.1897C2.49977 13.2203 3.76641 12.6467 5.10729 12.5885L5.33333 12.5833H13.6667ZM9.5 0.083252C10.8813 0.083252 12.2061 0.631986 13.1828 1.60874C14.1596 2.58549 14.7083 3.91025 14.7083 5.29159C14.7083 6.67292 14.1596 7.99768 13.1828 8.97443C12.2061 9.95119 10.8813 10.4999 9.5 10.4999C8.11866 10.4999 6.7939 9.95119 5.81715 8.97443C4.8404 7.99768 4.29167 6.67292 4.29167 5.29159C4.29167 3.91025 4.8404 2.58549 5.81715 1.60874C6.7939 0.631986 8.11866 0.083252 9.5 0.083252Z" fill="black"/>
    </svg>
                        </div> ';
                    }
                    ?>
                </div>
               <div class="container-img-men-outfit">
                   <img src="../public/img/menOutfit.png" id="image-men-outfit" />
               </div>
               <div class="container-shop-img">
                <div class="container-shop">
                
                <div id="listeArticles">

                <?php foreach ($produits as $produit): ?>
                    <a href="/projet-web-transactionnel-2023-The0o/src/app/views/Produits.php?id=<?php echo $produit->idProduit; ?>">
                    <div class="article">
                        <div class="previewImageArticle">
                <img src="../models/image/<?php echo $produit->imagesProduit; ?>" id="image1" alt="image2">
                        </div>
                        <div class="articleNom"><?php echo $produit->nomProduit; ?></div>
                        <div class="articleType"><?php echo $produit->marqueProduit; ?></div>
                        <div class="articlePrix"><?php echo $produit->prixProduit;?> $</div>
                        <div class="articleCouleur" style="background-color:#<?php echo $produit->couleurProduit;?>;"></div>
                    </div>
                    </a>
                <?php endforeach; ?>
                </div>
               </div>

                <div class="container-img-men-outfit-body">
                   <img src="../public/img/menOutfitBody.png" id="image-men-outfit-body">
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

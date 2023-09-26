<?php
require_once('../controllers/ProduitController.php');
$produitController = new ProduitController($mysqli);
$produits = $produitController->afficherTousLesProduits();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panneau Admin</title>
    <link rel="stylesheet" type="text/css" href="../public/css/panneauAdmin.css" />
    <link rel="stylesheet" type="text/css" href="../public/css/navBar.css" />
    <script src="../public/js/panneauAdmin.js"></script>
</head>

<body>
    <div id="navBar">
        <div id="logo" onclick="window.location.replace('accueil.html')">
            WIREFIT
        </div>
        <div id="naviguerCategories">
            <a href="./listeProduit.html">Produit</a>
            <a href="./listeProduit.html">Clients</a>
            <a href="./listeProduit.html">Administration</a>
        </div>
        <div id="imageDefilerMenu">
            <img src="../img/menu.svg" alt="Menu déroulant">
        </div>
    </div>

    <div id="popupAjout">
        <div id="contenuPopupAjout">
            <button class="boutonFermer" onclick="fermerPopupAjout()">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </button>
            <div class="contenuProduit">
                <div class="titrePopup">
                    <p>Ajouter un produit</p>
                </div>
                <div class="champsProduit">
                    <div class="champ">
                        <p>Nom du produit</p>
                        <input type="text">
                    </div>
                    <div class="champ">
                        <p>Marque du produit</p>
                        <input type="text">
                    </div>
                    <div class="champ">
                        <p>Prix du produit</p>
                        <input type="text">
                    </div>
                    <div class="champ">
                        <p>Description du produit</p>
                        <input type="text">
                    </div>
                    <div class="champ">
                        <p>Tailles du produit</p>
                        <div id="choixTailles">
                            <div>
                                <input type="checkbox" name="s" value="S">
                                <label for="s">S</label>
                            </div>
                            <div>
                                <input type="checkbox" name="m" value="M">
                                <label for="m">M</label>
                            </div>
                            <div>
                                <input type="checkbox" name="l" value="L">
                                <label for="l">L</label>
                            </div>
                        </div>
                    </div>
                    <div class="champ">
                        <p>Couleurs du produit</p>
                        <div id="champCouleurs">
                            <div>
                                <input type="checkbox" name="noir" value="Noir">
                                <label for="noir">Noir</label>
                            </div>
                            <div>
                                <input type="checkbox" name="vert" value="Vert">
                                <label for="vert">Vert</label>
                            </div>
                            <div>
                                <input type="checkbox" name="rouge" value="Rouge">
                                <label for="rouge">Rouge</label>
                            </div>
                        </div>
                    </div>
                    <div class="champ">
                        <p>Images du produit</p>
                        <input type="file" accept="image/png, image/jpeg" multiple />
                    </div>
                </div>
                <button id="boutonAjoutProduitPopup" onclick="ajouterProduit()">
                    <p>Ajouter le produit</p>
                </button>
            </div>
        </div>
    </div>

    <div id="popupAffichage">
        <div id="contenuPopupAffichage">
            <button class="boutonFermer" onclick="fermerPopupAffichage()">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </button>
            <div class="contenuMessage">
                <p>Êtes-vous sûr de ne plus vouloir afficher ce produit sur le site ?</p>
                <div class="boutonsConfirmationEtAnnulation">
                    <button class="boutonConfirmationPopup" onclick="fermerPopupAffichage()">
                        <p>Annuler</p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 384 512">
                            <path
                                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                        </svg>
                    </button>
                    <button class="boutonConfirmationPopup">
                        <p>Confirmer</p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="popupModification">
        <div id="contenuPopupModification">
            <button class="boutonFermer" onclick="fermerPopupModification()">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </button>
            <div class="contenuProduit">
                <div class="titrePopup">
                    <p>Modifier un produit</p>
                </div>
                <div class="champsProduit">
                    <div class="champ">
                        <p>Nom du produit</p>
                        <input type="text">
                    </div>
                    <div class="champ">
                        <p>Marque du produit</p>
                        <input type="text">
                    </div>
                    <div class="champ">
                        <p>Prix du produit</p>
                        <input type="text">
                    </div>
                    <div class="champ">
                        <p>Description du produit</p>
                        <input type="text">
                    </div>
                    <div class="champ">
                        <p>Tailles du produit</p>
                        <div id="choixTailles">
                            <div>
                                <input type="checkbox" name="s" value="S">
                                <label for="s">S</label>
                            </div>
                            <div>
                                <input type="checkbox" name="m" value="M">
                                <label for="m">M</label>
                            </div>
                            <div>
                                <input type="checkbox" name="l" value="L">
                                <label for="l">L</label>
                            </div>
                        </div>
                    </div>
                    <div class="champ">
                        <p>Couleurs du produit</p>
                        <div id="champCouleurs">
                            <div>
                                <input type="checkbox" name="noir" value="Noir">
                                <label for="noir">Noir</label>
                            </div>
                            <div>
                                <input type="checkbox" name="vert" value="Vert">
                                <label for="vert">Vert</label>
                            </div>
                            <div>
                                <input type="checkbox" name="rouge" value="Rouge">
                                <label for="rouge">Rouge</label>
                            </div>
                        </div>
                    </div>
                    <div class="champ">
                        <p>Images du produit</p>
                        <input type="file" accept="image/png, image/jpeg" multiple />
                    </div>
                </div>
                <div class="boutonsConfirmationEtAnnulation">
                    <button class="boutonConfirmationPopup" onclick="fermerPopupModification()">
                        <p>Annuler</p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 384 512">
                            <path
                                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                        </svg>
                    </button>
                    <button class="boutonConfirmationPopup">
                        <p>Confirmer</p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="popupSuppression">
        <div id="contenuPopupSuppression">
            <button class="boutonFermer" onclick="fermerPopupSuppression()">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
            </button>
            <div class="contenuMessage">
                <p>Êtes-vous sûr de vouloir supprimer DEFINITIVEMENT ce produit ?</p>
                <div class="boutonsConfirmationEtAnnulation">
                    <button class="boutonConfirmationPopup" onclick="fermerPopupSuppression()">
                        <p>Annuler</p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 384 512">
                            <path
                                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                        </svg>
                    </button>
                    <button class="boutonConfirmationPopup">
                        <p>Confirmer</p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="body">

        <div id="ajoutProduitEtCategories">
            <div id="ajoutProduit">
                <button id="boutonAjoutProduit" onclick="afficherPopupAjoutProduit()()">
                    <p>Ajouter un produit</p>
                    <p>+</p>
                </button>
            </div>
            <div id="categories">
                <button class="boutonsCategories" onclick="changerCategorieActive(this)">
                    <p>HOMME</p>
                </button>
                <button class="boutonsCategories" onclick="changerCategorieActive(this)">
                    <p>FEMME</p>
                </button>
                <button class="boutonsCategories" onclick="changerCategorieActive(this)">
                    <p>ENFANT</p>
                </button>
            </div>
        </div>

        <div id="titreEtFiltre">
            <div id="titre">
                T-shirt pour homme
            </div>
            <div id="listeFiltre">
                <div class="filtre">
                    <p>Prix</p>
                    <img src="../img/fleche.svg" alt="fleche vers le bas">
                </div>
                <div class="filtre">
                    <p>Tailles</p>
                    <img src="../img/fleche.svg" alt="fleche vers le bas">
                </div>
                <div class="filtre">
                    <p>Couleurs</p>
                    <img src="../img/fleche.svg" alt="fleche vers le bas">
                </div>
            </div>
        </div>

        <div id="listeArticles">

            <?php foreach ($produits as $produit): ?>
                <div class="article">
                <div id="actionProduit">
                    <div class="affichageProduit" onclick="afficherPopupAffichageProduit()">
                        <svg width="48" height="37" viewBox="0 0 48 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14 12.27L15.28 11L32 27.72L30.73 29L27.65 25.92C26.5 26.3 25.28 26.5 24 26.5C19 26.5 14.73 23.39 13 19C13.69 17.24 14.79 15.69 16.19 14.46L14 12.27ZM24 16C24.7956 16 25.5587 16.3161 26.1213 16.8787C26.6839 17.4413 27 18.2044 27 19C27.0005 19.3406 26.943 19.6787 26.83 20L23 16.17C23.3213 16.057 23.6594 15.9995 24 16ZM24 11.5C29 11.5 33.27 14.61 35 19C34.1839 21.0732 32.7969 22.8727 31 24.19L29.58 22.76C30.9629 21.8034 32.0782 20.5091 32.82 19C32.0116 17.3499 30.7564 15.9598 29.1973 14.9875C27.6381 14.0152 25.8375 13.4999 24 13.5C22.91 13.5 21.84 13.68 20.84 14L19.3 12.47C20.74 11.85 22.33 11.5 24 11.5ZM15.18 19C15.9884 20.6501 17.2436 22.0402 18.8027 23.0125C20.3619 23.9848 22.1625 24.5001 24 24.5C24.69 24.5 25.37 24.43 26 24.29L23.72 22C23.0242 21.9254 22.3748 21.6149 21.88 21.12C21.3851 20.6252 21.0746 19.9758 21 19.28L17.6 15.87C16.61 16.72 15.78 17.78 15.18 19Z"
                                fill="#F8F8F8" />
                        </svg>
                    </div>
                    <div class="modificationProduit" onclick="afficherPopupModificationProduit()">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.1981 1.22004L3.12013 11.298C2.96948 11.4483 2.87069 11.6428 2.83813 11.853L2.13313 16.447C2.10934 16.6022 2.12242 16.7608 2.17129 16.91C2.22017 17.0591 2.30348 17.1947 2.41448 17.3057C2.52547 17.4167 2.66104 17.5 2.81022 17.5489C2.95939 17.5978 3.11797 17.6108 3.27313 17.587L7.86813 16.882C8.0783 16.8498 8.27271 16.7513 8.42313 16.601L18.5011 6.52304C18.6886 6.33552 18.7939 6.08121 18.7939 5.81604C18.7939 5.55088 18.6886 5.29657 18.5011 5.10905L14.6111 1.21904C14.4236 1.03188 14.1696 0.926758 13.9046 0.926758C13.6397 0.926758 13.3856 1.03188 13.1981 1.21904V1.22004ZM4.31713 15.404L4.76513 12.48L13.9051 3.34004L16.3801 5.81604L7.24013 14.956L4.31713 15.404Z"
                                fill="#F8F8F8" />
                            <path d="M11.4419 5.24704L12.5019 4.18604L15.7439 7.42604L14.6829 8.48704L11.4419 5.24704Z"
                                fill="#F8F8F8" />
                        </svg>
                    </div>
                    <div class="suppressionProduit" onclick="afficherPopupSuppressionProduit()">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 21C6.45 21 5.979 20.804 5.587 20.412C5.195 20.02 4.99933 19.5493 5 19V6H4V4H9V3H15V4H20V6H19V19C19 19.55 18.804 20.021 18.412 20.413C18.02 20.805 17.5493 21.0007 17 21H7ZM17 6H7V19H17V6ZM9 17H11V8H9V17ZM13 17H15V8H13V17Z"
                                fill="#F8F8F8" />
                        </svg>
                    </div>
                </div>
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
                <div class="articlePrix"><?php echo $produit->prixProduit; ?>$</div>
                <div class="articleCouleur" style="background-color:#<?php echo $produit->couleurProduit;?>;"></div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</body>

</html>
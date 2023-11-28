<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../controllers/PanierController.php');
require_once('../controllers/ProduitController.php');
require_once('../models/Utilisateur.php');

session_start();
$panierController = new PanierController($mysqli);
$produitController = new ProduitController($mysqli);
$utilisateurObjet = $_SESSION['utilisateur'];
$emailUtilisateur = $utilisateurObjet->getEmail();
$panier = $panierController->ListPanierProduit($emailUtilisateur);
$listeProduit = [];
if($panier !== null){
    foreach($panier as $produit){
        $listeProduit[] = $produitController->afficherUnProduitParSonId($produit->idProduit);
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'supprimerProduitPanier') {
            $idProduit = $_POST['idProduit'];
            $panierController->supprimerProduitPanier($idProduit, $emailUtilisateur);
            header('Location: PanierUtilisateur.php');
        } elseif ($_POST['action'] === 'modifierQuantite') {
            $idProduit = $_POST['idProduit'];
            $quantite = $_POST['quantity'];
            $panierController->modifierQuantiteProduitPanier($idProduit, $emailUtilisateur, $quantite);
            header('Location: PanierUtilisateur.php');
        } elseif ($_POST['action'] === 'afficherPrixPanier') {
            $total = $panierController->afficherPrixPanier($emailUtilisateur);
            $total = implode($total);
            echo $total."$";
            exit();
        }
    }
}
$total = $panierController->afficherPrixPanier($emailUtilisateur);
$total = implode($total);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="../public/css/listeProduit.css">
    <link rel="stylesheet" href="../public/css/navBar.css">
    <link rel="stylesheet" href="../public/css/commande.css">
</head>
<body>
    <div id="navBar">
        <div id="logo">
        <a href="../public/index.php" id="aLien" class="aucuneDecoration">

                    WIREFIT
</a>
        </div>
        <div id="imageDefilerMenu">
            <img src="../img/menu.svg" alt="Menu déroulant">
        </div>
    </div>
    <div class="container">
    <?php foreach ($listeProduit as $key => $produit): ?>
    <div class="item" id="<?php echo $produit->idProduit; ?>">
        <div class="contenu-commande">
            <div class="info-nom-categorie">
                <div class="nom-produit txt-g3"><?php echo $produit->nomProduit; ?></div>
                <div class="categorie"><?php echo $produit->descriptionProduit; ?></div>
            </div>
            <div class="btn-produit">
            <div class="select-quantity contenu-commande">
    <label for="quantity">Quantité :</label>
    <!--<form method="post" action="PanierUtilisateur.php">-->
        <select class="quantity" onchange="modifierQuantite(<?php echo $produit->idProduit; ?>, this.value)">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <option value="<?php echo $i; ?>" <?php if ($i == $panier[$key]->QuantiterProduit) { echo 'selected'; } ?>><?php echo $i; ?></option>
            <?php endfor; ?>
        </select>
        <input type="hidden" name="idProduit" value="<?php echo $produit->idProduit; ?>">
        <input type="hidden" name="action" value="modifierQuantite">
    <!--</form>-->
</div>
            </div>
            <div class="contenu-commande">
            <div class="poubel contenu-commande">
                        <input type="hidden" name="idProduit" value="<?php echo $produit->idProduit; ?>">
<button onclick="supprimerProduit(<?php echo $produit->idProduit; ?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16m-10 4v6m4-6v6M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-12M9 7V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v3"/>
                            </svg>
                        </button>
                </div>
                <div class="txt-g3 prix"><?php echo $produit->prixProduit; ?> $</div>
            </div>
        </div>
        <div class="barre"></div>
    </div>
<?php endforeach; ?>


        <div class="total txt-g3" id="total">TOTAL : <?php echo $total;?> $</div>
        </div>
        <div class="commander">
            <a href="Paiment.php">
            <button class="btn-commander">Commander</button>
            </a>
    </div>
   
</body>
<script >
// Fonction pour supprimer un produit du panier en AJAX sans recharger la page
function supprimerProduit(idProduit, elementToDelete) {
    const url = 'PanierUtilisateur.php';
    const formData = new FormData();
    formData.append('idProduit', idProduit);
    formData.append('action', 'supprimerProduitPanier');
    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            // Supprimer le produit du DOM
            const productElement = document.getElementById(`produit_${idProduit}`);
            const elementToDelete = document.getElementById(idProduit);
            elementToDelete.remove();
            afficherPrixPanier();
        } else {
            console.error('Erreur lors de la suppression du produit');
        }
    })
    .catch(error => {
        console.error('Erreur réseau:', error);
    });
}


// Fonction pour modifier la quantité d'un produit du panier en AJAX sans recharger la page
function modifierQuantite(idProduit, nouvelleQuantite) {
    console.log("hey");
    const url = 'PanierUtilisateur.php';
    const formData = new FormData();
    formData.append('idProduit', idProduit);
    formData.append('quantity', nouvelleQuantite);
    formData.append('action', 'modifierQuantite');

    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            const productQuantityElement = document.getElementById(`quantiteProduit_${idProduit}`);
            afficherPrixPanier();
            if (productQuantityElement) {
                productQuantityElement.textContent = nouvelleQuantite;
            }
        } else {
            console.error('Erreur lors de la modification de la quantité du produit');
        }
       
    })
    .catch(error => {
        console.error('Erreur réseau:', error);
    });
}

function afficherPrixPanier() {
    const url = 'PanierUtilisateur.php'; // Modifiez le chemin vers votre script PHP pour obtenir le prix total
    const formData = new FormData();
    formData.append('action', 'afficherPrixPanier');
    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            return response.text();
        } else {
            throw new Error('Erreur lors de l\'affichage du prix du panier');
        }
    })
    .then(totalPrice => {
        const totalElement = document.getElementById('total');
        if (totalElement) {
            totalElement.textContent = totalPrice; // Mettre à jour l'élément HTML avec le prix total
        } else {
            console.error('Élément pour afficher le prix total non trouvé');
        }
    })
    .catch(error => {
        console.error('Erreur réseau:', error);
    });
}



</script>
</html>



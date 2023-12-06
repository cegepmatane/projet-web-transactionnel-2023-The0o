function assombrirBackground() {
    document.getElementById("navBar").style.opacity = "50%";
    document.getElementById("body").style.opacity = "50%";
}

function eclaircirBackground() {
    document.getElementById("navBar").style.opacity = "100%";
    document.getElementById("body").style.opacity = "100%";
}

function afficherPopupAjoutProduit() {
    assombrirBackground();
    document.getElementById("popupAjout").style.display = "block";
}

function fermerPopupAjout() {
    eclaircirBackground();
    document.getElementById("popupAjout").style.display = "none";
}

function afficherPopupAffichageProduit() {
    assombrirBackground();
    document.getElementById("popupAffichage").style.display = "block";
}

function fermerPopupAffichage() {
    eclaircirBackground()
    document.getElementById("popupAffichage").style.display = "none";
}

function afficherPopupModificationProduit() {
    assombrirBackground();
    document.getElementById("popupModification").style.display = "block";
}

function fermerPopupModification() {
    eclaircirBackground()
    document.getElementById("popupModification").style.display = "none";
}

let produitActuel;

function afficherPopupSuppressionProduit(produit) {
    produitActuel = produit;
    assombrirBackground();
    document.getElementById("popupSuppression").style.display = "block";
}

function fermerPopupSuppression() {
    eclaircirBackground()
    document.getElementById("popupSuppression").style.display = "none";
}


function supprimerProduit() {
    console.log(produitActuel);
}

let previous_categorie;

function changerCategorieActive(categorie) {
    if (previous_categorie === undefined) {
        previous_categorie = categorie;
    }
    previous_categorie.style.backgroundColor = "transparent";
    previous_categorie.style.color = "black";
    previous_categorie = categorie;
    categorie.style.backgroundColor = "black";
    categorie.style.color = "white";
}

document.getElementById("formAjoutProduit").addEventListener('submit', function (event) {
    event.preventDefault();
    var formData = new FormData(this);

    fetch('./ajoutProduitBDD.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.success) {
            fermerPopupAjout();
        } else {
            alert('Erreur lors de l\'ajout du produit. Réessayer.');
        }
    })
    .catch(error => {
        alert('Une erreur est survenue. Réessayer s\'il vous plait.');
    });
});

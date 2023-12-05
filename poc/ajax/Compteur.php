<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define('DB_HOST', 'localhost');
define('DB_USER', 'TestUserAdmin');
define('DB_PASSWORD', '123');
define('DB_NAME', 'wirefit');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($mysqli->connect_error) {
    die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");

function getListPanier($mailClient){
    global $mysqli;
    $sql = "SELECT idProduit,QuantiterProduit FROM PANIER WHERE mailClient = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $mailClient);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result === false) {
        return false; 
    }
    while ($row = $result->fetch_assoc()) {
        echo "<div id='p".$row['idProduit']."'>";
        getProduitById($row['idProduit']);
        echo $row['QuantiterProduit'];
        echo "<select name='quantite' id='quantite' onchange='modifierQuantite(".$row['idProduit'].", this.value)'>";
        for ($i = 1; $i <= 5; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        echo "</select>";
        echo "<button type='submit' name='action' onclick='supprimerProduit(".$row['idProduit'].")' value='supprimerProduitPanier'>Supprimer</button>";
        echo "</div>";
        echo "<br>";

    }
}

   function getProduitById($id){
        global $mysqli;
        $sql = "SELECT * FROM PRODUIT WHERE idProduit = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            return false; 
        }
        while ($row = $result->fetch_assoc()) {
            echo $row['nomProduit'];
            echo $row['prixProduit'];
        }

    return 'ok';
}


function deleteProduitPanier($idProduit){
    global $mysqli;
    $emailUtilisateur = 'nathan.ropert2@gmail.com';
    $sql = "DELETE FROM PANIER WHERE idProduit = ? AND mailClient = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("is", $idProduit, $emailUtilisateur);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        return false; 
    }

    return 'ok';
}

function updateQuantiteProduitPanier($idProduit, $quantite){
    global $mysqli;
    $emailUtilisateur = 'nathan.ropert2@gmail.com';
    $sql = "UPDATE PANIER SET QuantiterProduit = ? WHERE idProduit = ? AND mailClient = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("iis", $quantite, $idProduit, $emailUtilisateur);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        return false; 
    }

    return 'ok';
}

function afficherPrixPanier($mailClient){
    global $mysqli;
    $sql = "SELECT SUM(QuantiterProduit * prixProduit) AS total FROM PANIER NATURAL JOIN PRODUIT WHERE mailClient = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $mailClient);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result === false) {
        return false; 
    }
    $row = $result->fetch_assoc();
    echo $row['total'];
}

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'supprimerProduitPanier' : deleteProduitPanier($_POST['idProduit']);break;
        case 'modifierQuantite' : updateQuantiteProduitPanier($_POST['idProduit'], $_POST['quantity'], );break;
        case 'afficherPrixPanier' : afficherPrixPanier('nathan.ropert2@gmail.com');exit();break;
}
}


getListPanier('nathan.ropert2@gmail.com');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier POC</title>
</head>
<body>
<div id="total"><?php afficherPrixPanier('nathan.ropert2@gmail.com')?> </div>
</body>
<script>
// Fonction pour supprimer un produit du panier en AJAX sans recharger la page
function supprimerProduit(idProduit, elementToDelete) {
    console.log(idProduit);
    console.log("hey");
    const url = 'Compteur.php';
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
            afficherPrixPanier();
            const ligne = document.getElementById('p'+idProduit);
            ligne.remove();
        } else {
            console.error('Erreur lors de la suppression du produit', error);
        }
    })
    .catch(error => {
        console.error('Erreur réseau:', error);
    });
}


// Fonction pour modifier la quantité d'un produit du panier en AJAX sans recharger la page
function modifierQuantite(idProduit, nouvelleQuantite) {
    const url = 'Compteur.php';
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
            if (productQuantityElement) {
                productQuantityElement.textContent = nouvelleQuantite;
            }
            afficherPrixPanier();
        } else {
            console.error('Erreur lors de la modification de la quantité du produit');
        }
       
    })
    .catch(error => {
        console.error('Erreur réseau:', error);
    });
}
   

function afficherPrixPanier() {
    const url = 'Compteur.php'; // Modifiez le chemin vers votre script PHP pour obtenir le prix total
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


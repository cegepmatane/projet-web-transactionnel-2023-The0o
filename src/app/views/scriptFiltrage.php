<?php
require_once('../controllers/ProduitController.php');

$servername = "localhost";
$username = "TestUserAdmin";
$password = "123";
$dbname = "wirefit";

$mysqli = new mysqli($servername, $username, $password, $dbname);

$prixMin = $_GET['prixMin'];
$prixMax = $_GET['prixMax'];

$sql = "SELECT * FROM PRODUIT WHERE prixProduit > $prixMin AND prixProduit < $prixMax;";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $produitController = new ProduitController($mysqli);
        $produit = $produitController->afficherUnProduitParSonId($row["idProduit"]);
        echo '<div class="article">
        <div class="previewImageArticle">
                <img src="../models/image/'.$produit->imagesProduit.'" alt="image2">
      </div>
        <div class="articleNom">'.$produit->nomProduit.'</div>
        <div class="articleType">'.$produit->marqueProduit.'</div>
        <div class="articlePrix">'.$produit->prixProduit.'</div>
        <div class="articleCouleur" style="background-color:#'.$produit->couleurProduit.'"></div>
    </div>';
    }
} else {
    echo "Aucun produit trouvé dans cette rangée de prix.";
}
?>

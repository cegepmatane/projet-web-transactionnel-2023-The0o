<?php
require_once('../controllers/ProduitController.php');
$produitController = new ProduitController($mysqli);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Filtrer et valider les données du formulaire
    $nom = filter_input(INPUT_POST, 'nomProduit', FILTER_SANITIZE_STRING);
    $prix = filter_input(INPUT_POST, 'prixProduit', FILTER_VALIDATE_FLOAT);
    $description = filter_input(INPUT_POST, 'descriptionProduit', FILTER_SANITIZE_STRING);
    $marque = filter_input(INPUT_POST, 'marqueProduit', FILTER_SANITIZE_STRING);
    $reduction = filter_input(INPUT_POST, 'reductionProduit', FILTER_VALIDATE_FLOAT);
    $sexe = filter_input(INPUT_POST, 'sexeProduit', FILTER_VALIDATE_INT);
    $afficher = isset($_POST['afficherProduit']) ? 1 : 0;
    $type = filter_input(INPUT_POST, 'typeProduit', FILTER_SANITIZE_STRING);
    $imagesUn = $_FILES['imageUn'];
    $imagesDeux = $_FILES['imageDeux'];

    // Example response array (you can customize based on your needs)
    $response = [
        'success' => false,
        'message' => 'Ajout du produit annulé.',
    ];

    // Valider et ajouter le produit à la base de données (vous devez implémenter cette logique)
    if ($nom && $prix !== false) {
        // Ajouter le produit à la base de données en utilisant la méthode appropriée de ProduitController
        $produitController->ajouterUnProduit($nom, $prix, $description, $marque, $reduction, $sexe, $afficher, $type, $imagesUn, $imagesDeux);

        // Mettre à jour la réponse en cas de succès
        $response['success'] = true;
        $response['message'] = 'Produit ajouté avec succès.';
    }

    // Retourner la réponse au format JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>

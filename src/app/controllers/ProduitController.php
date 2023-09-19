<?php
require_once('../models/Produit.php');
require_once('../models/ProduitDAO.php');

class ProduitController {
    private $produitDAO;

    public function __construct($connexion) {
        $this->produitDAO = new ProduitDAO($connexion);
    }

    public function afficherTousLesProduits() {
        $produits = $this->produitDAO->getAllProduits();

        include('../views/produits.php');
    }
}
?>

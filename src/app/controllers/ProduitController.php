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

    public function afficherUnProduitParSonId($id){
        $produit = $this->produitDAO->getProduitById($id);
        include('../views/Produits.php');
    }

    public function afficherProduitAccueil(){
        $produits = $this->produitDAO->getFourProduits();
        include('../views/accueil.php');
    }
}
?>

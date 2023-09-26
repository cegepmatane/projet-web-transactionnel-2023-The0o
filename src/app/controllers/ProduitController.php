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
        return $produits;
    }

    public function afficherProduitAccueil(){
        $produits = $this->produitDAO->getFourProduits();
        include('../views/Accueil.php');
    }

    public function afficherProduitParChoix(){
        //TODO Quand on recois les donnees on fait une verification antiSQL et on modifie ici
        $trie = null;
        $prix = null;
        $taille = null;
        $couleur = null;
        $type = null;
        $reduction = null;
        $produits = $this->produitDAO->getProduitsByChoice($trie,$prix,$taille,$couleur,$type,$reduction);
        include('../views/ListeProduit.php');
    }

    public function afficherUnProduitParSonId($id){
        $produits = $this->produitDAO->getProduitById($id);
        return $produits;
    }
}
?>

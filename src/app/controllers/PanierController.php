<?php
require_once('../models/PanierDAO.php');

class PanierController{
    private $panierDAO;

    public function __construct($connexion) {
        $this->panierDAO = new PanierDAO($connexion);
    }

    public function ListPanierProduit($mailClient){
        $panier = $this->panierDAO->getListPanier($mailClient);
        return $panier;
    }

    public function supprimerProduitPanier($idProduit, $emailUtilisateur){
        $this->panierDAO->deleteProduitPanier($idProduit, $emailUtilisateur);
    }

    public function modifierQuantiteProduitPanier($idProduit, $emailUtilisateur, $quantite){
        $this->panierDAO->updateQuantiteProduitPanier($idProduit, $emailUtilisateur, $quantite);
    }

    public function afficherPrixPanier($emailUtilisateur){
        $prixTotal = $this->panierDAO->totalPricePanier($emailUtilisateur);
        return $prixTotal;
    }

    public function ajouterProduitPanier($emailUtilisateur, $idProduit){
        $ajouterProduitPanier = $this->panierDAO->addProduitPanier($emailUtilisateur, $idProduit);
        return $ajouterProduitPanier;
    }

    public function viderPanier($emailUtilisateur){
        $this->panierDAO->deletePanier($emailUtilisateur);
    }
}
?>
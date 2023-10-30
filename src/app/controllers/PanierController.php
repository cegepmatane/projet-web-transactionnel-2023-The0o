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
}
?>
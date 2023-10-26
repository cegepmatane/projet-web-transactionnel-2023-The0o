<?php
require_once('../models/PanierDAO.php');

class PanierController{
    private $panierDAO;

    public function __construct($panierDAO) {
        $this->panierDAO = $panierDAO;
    }

    public function ListPanierProduit($mailClient){
        $panier = $this->panierDAO->getListPanier($mailClient);
        return $panier;
    }
}
?>
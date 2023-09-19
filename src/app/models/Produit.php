<?php
class Produit {
    public $idProduit;
    public $nomProduit;
    public $prixProduit;
    public $sousTitreProduit;
    public $descriptionProduit;
    public $marqueProduit;
    public $reductionProduit;

    public function __construct($id, $nom, $prix, $sousTitre, $description, $marque, $reduction) {
        $this->idProduit = $id;
        $this->nomProduit = $nom;
        $this->prixProduit = $prix;
        $this->sousTitreProduit = $sousTitre;
        $this->descriptionProduit = $description;
        $this->marqueProduit = $marque;
        $this->reductionProduit = $reduction;
    }
}

?>
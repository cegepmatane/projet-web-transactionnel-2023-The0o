<?php
class Produit {
    public $idProduit;
    public $nomProduit;
    public $prixProduit;
    public $sousTitreProduit;
    public $descriptionProduit;
    public $marqueProduit;
    public $reductionProduit;
    public $couleurProduit;
    public $imagesProduit;
    public $imagesDeuxProduit;

    public function __construct($id, $nom, $prix, $sousTitre, $description, $marque, $reduction, $couleur,$imagesProduit,$imagesDeuxProduit) {
        $this->idProduit = $id;
        $this->nomProduit = $nom;
        $this->prixProduit = $prix;
        $this->sousTitreProduit = $sousTitre;
        $this->descriptionProduit = $description;
        $this->marqueProduit = $marque;
        $this->reductionProduit = $reduction;
        $this->couleurProduit = $couleur;
        $this->imagesProduit = $imagesProduit;
        $this->imagesDeuxProduit = $imagesDeuxProduit;
    }
}

?>

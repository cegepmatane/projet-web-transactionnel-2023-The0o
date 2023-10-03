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
        $this->idProduit = filter_var($id, FILTER_VALIDATE_INT);
        $this->nomProduit = filter_var($nom, FILTER_SANITIZE_STRING);
        $this->prixProduit = filter_var($prix, FILTER_SANITIZE_STRING);
        $this->sousTitreProduit = filter_var($sousTitre, FILTER_SANITIZE_STRING);
        $this->descriptionProduit = filter_var($description, FILTER_SANITIZE_STRING);
        $this->marqueProduit = filter_var($marque, FILTER_SANITIZE_STRING);
        $this->reductionProduit = filter_var($reduction, FILTER_SANITIZE_STRING);
        $this->couleurProduit = filter_var($couleur, FILTER_SANITIZE_STRING);
        $this->imagesProduit = $imagesProduit;
        $this->imagesDeuxProduit = $imagesDeuxProduit;
    }
}

?>

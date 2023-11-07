<?php
class Produit {
    public $idProduit;
    public $nomProduit;
    public $prixProduit;
    public $sousTitreProduit;
    public $descriptionProduit;
    public $marqueProduit;
    public $reductionProduit;
    public $afficherProduit;
    public $couleurProduit;
    public $imagesProduit;
    public $imagesDeuxProduit;

    public function __construct($id, $nom, $prix, $sousTitre, $description, $marque, $reduction, $afficher, $couleur,$imagesProduit,$imagesDeuxProduit) {
        $this->idProduit = filter_var($id, FILTER_VALIDATE_INT);
        $this->nomProduit = htmlspecialchars($nom);
        $this->prixProduit = htmlspecialchars($prix);
        $this->sousTitreProduit = htmlspecialchars($sousTitre);
        $this->descriptionProduit = htmlspecialchars($description);
        $this->marqueProduit = htmlspecialchars($marque);
        $this->reductionProduit = htmlspecialchars($reduction);
        $this->afficherProduit = htmlspecialchars($afficher);
        $this->couleurProduit = htmlspecialchars($couleur);
        $this->imagesProduit = $imagesProduit;
        $this->imagesDeuxProduit = $imagesDeuxProduit;
    }
}

?>

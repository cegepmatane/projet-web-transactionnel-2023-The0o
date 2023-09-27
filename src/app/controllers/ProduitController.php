<?php
require_once('../models/Produit.php');
require_once('../models/ProduitDAO.php');
require_once('../models/Taille.php');
require_once('../models/Couleur.php');
require_once('../models/Categorie.php');

class ProduitController {
    private $produitDAO;

    public function __construct($connexion) {
        $this->produitDAO = new ProduitDAO($connexion);
    }

    public function afficherTousLesProduits() {
        $produits = $this->produitDAO->getAllProduits();
        return $produits;
    }

    public function afficherListeDesTaille(){
        $taille = $this->produitDAO->getListSize();
        return $taille;
    }

    public function afficherListeDesCouleurs(){
        $couleur = $this->produitDAO->getListColor();
        return $couleur;
    }

    public function afficherListeDesCategorie(){
        $categorie = $this->produitDAO->getListCategorie();
        return $categorie;
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

    public function afficherCouleurParProduit($id){
        $couleur = $this->produitDAO->getColorByProductId($id);
        return $couleur;
    }

    public function afficherTailleParProduit($id){
        $taille = $this->produitDAO->getSizeByProductId($id);
        return $taille;
    }

    public function ajouterUnProduit($nomProduit,$prixProduit,$descriptionProduit,$marqueProduit,$reductionProduit,$couleurProduit,$tailleProduit,$typeProduit,$imageProduit,$imageProduit2){
        $resultatAjout = $this->produitDAO->addProduit($nomProduit,$prixProduit,$descriptionProduit,$marqueProduit,$reductionProduit,$couleurProduit,$tailleProduit,$typeProduit,$imageProduit,$imageProduit2);
    }

    public function modifierProduit($id, $nom, $prix, $description, $marque, $reduction, $sexe, $afficher, $type, $imagesUn, $imagesDeux) {
        $produit = $this->produitDAO->modifyProduit($id, $nom, $prix, $description, $marque, $reduction, $sexe, $afficher, $type, $imagesUn, $imagesDeux);
        return $produit;
    }

    public function supprimerProduit($id) {
        $produit = $this->produitDAO->deleteProduit($id);
        return $produit;
    }

    public function ajouterUneTaille($nomTaille){
        $taille = $this->produitDAO->addSize($nomTaille);
        return $taille;

    }

    public function SuppUneTaille($nomTaille){
        $taille = $this->produitDAO->deleteSize($nomTaille);
        return $taille;
    }

    public function ajouterUneCouleur($nomCouleur, $hexaCouleur){
        $couleur = $this->produitDAO->addColor($nomCouleur, $hexaCouleur);
        return $couleur;
    }
    
    public function supprimerUneCouleur($nomCouleur){
        $nomCouleur = $this->produitDAO->deleteColor($nomCouleur);
        return $nomCouleur;
    }
}
?>

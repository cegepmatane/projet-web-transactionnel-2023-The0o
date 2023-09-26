<?php
require_once('../config/database.php');

class ProduitDAO {
    private $conn;

    public function __construct($connexion) {
        $this->conn = $connexion;
    }

    public function getAllProduits() {
        $sql = "SELECT * FROM PRODUIT";
        $result = $this->conn->query($sql);

        if ($result === false) {
            return false; 
        }

        $produits = [];

        while ($row = $result->fetch_assoc()) {
            $sql = "SELECT COULEUR.hexaCouleur FROM PRODUIT NATURAL JOIN COULEUR WHERE idProduit=".$row['idProduit']." LIMIT 1";
            $couleurResult= $this->conn->query($sql);

            if ($couleurResult) {
                $couleurRow = $couleurResult->fetch_assoc();
                $couleurProduit = $couleurRow['hexaCouleur'];
            } else {
                $couleurProduit = "000000";
            }

            $produit = new Produit(
                $row['idProduit'],
                $row['nomProduit'],
                $row['prixProduit'],
                $row['sousTitreProduit'],
                $row['descriptionProduit'],
                $row['marqueProduit'],
                $row['reductionProduit'],
                $couleurProduit,
                $row['imageUnProduit'],
                $row['imageDeuxProduit']
            );
        
            $produits[] = $produit;
        }

        return $produits;
    }

    public function getProduitById($id){
        $sql = "SELECT * FROM PRODUIT WHERE idProduit = ".$id."";
        $result = $this->conn->query($sql);

        if ($result === false) {
            return false; 
        }

        if ($row = $result->fetch_assoc()) {
            $sql = "SELECT COULEUR.hexaCouleur FROM PRODUIT NATURAL JOIN COULEUR WHERE idProduit=".$row['idProduit']." LIMIT 1";
            $couleurResult= $this->conn->query($sql);

            if ($couleurResult) {
                $couleurRow = $couleurResult->fetch_assoc();
                $couleurProduit = $couleurRow['hexaCouleur'];
            } else {
                $couleurProduit = "000000";
            }

            $produit = new Produit(
                $row['idProduit'],
                $row['nomProduit'],
                $row['prixProduit'],
                $row['sousTitreProduit'],
                $row['descriptionProduit'],
                $row['marqueProduit'],
                $row['reductionProduit'],
                $couleurProduit,
                $row['imageUnProduit'],
                $row['imageDeuxProduit']
            );
            return $produit;
        } else {
            return null; 
        }
    }

    public function getFourProduits() {
        $sql = "SELECT * FROM PRODUIT LIMIT 4;";
        $result = $this->conn->query($sql);

        if ($result === false) {
            return false; 
        }

        $produits = [];

        while ($row = $result->fetch_assoc()) {
            $sql = "SELECT COULEUR.hexaCouleur FROM PRODUIT NATURAL JOIN COULEUR WHERE idProduit=".$row['idProduit']." LIMIT 1";
            $couleurResult= $this->conn->query($sql);

            if ($couleurResult) {
                $couleurRow = $couleurResult->fetch_assoc();
                $couleurProduit = $couleurRow['hexaCouleur'];
            } else {
                $couleurProduit = "000000";
            }
            
            $produit = new Produit(
                $row['idProduit'],
                $row['nomProduit'],
                $row['prixProduit'],
                $row['sousTitreProduit'],
                $row['descriptionProduit'],
                $row['marqueProduit'],
                $row['reductionProduit'],
                $couleurProduit,
                $row['imageUnProduit'],
                $row['imageDeuxProduit']
            );
        
            $produits[] = $produit;
        }

        return $produits;
    }

    public function getListColor(){
        $sql = "SELECT * FROM COULEUR";
        $result = $this->conn->query($sql);

        if ($result === false) {
            return false; 
        }

        $couleurs = [];

        while ($row = $result->fetch_assoc()) {
            $couleur = new Couleur(
                $row['idCouleur'],
                $row['nomCouleur'],
                $row['hexaCouleur']
            );
            $couleurs[] = $couleur;
        }

        return $couleurs;
    }

    public function getListSize(){
        $sql = "SELECT * FROM TAILLE";
        $result = $this->conn->query($sql);

        if ($result === false) {
            return false; 
        }

        $tailles = [];

        while ($row = $result->fetch_assoc()) {
            $taille = new Taille(
                $row['idTaille'],
                $row['taille']
            );
            $tailles[] = $taille;
        }

        return $tailles;
    }

    public function getListCategorie(){
        $sql = "SELECT * FROM CATÉGORIE";
        $result = $this->conn->query($sql);

        if ($result === false) {
            return false; 
        }

        $categories = [];

        while ($row = $result->fetch_assoc()) {
            $categorie = new Categorie(
                $row['idCatégorie'],
                $row['nomCatégorie']
            );
            $categories[] = $categorie;
        }
        return $categories;
    }

    public function getProduitsByChoice($trie,$prix,$taille,$couleur,$type,$reduction){
        
        $conditions = [];

       if($trie != null){
            $orderTrie = "ORDER BY"+$trie+" ";
        }
        if($prix != null){
            $wherePrix = " PRODUIT.prixProduit = "+$prix+" ";
            $conditions[] = $wherePrix;
        }
        if($taille != null){
            $joinTaille = "NATURAL JOIN MESURER NATURAL JOIN TAILLE ";
            $whereTaille = " TAILLE.taille = "+$taille+"";
            $conditions[] = $whereTaille ;

        }
        if($couleur != null){
            $joinCouleur = "NATURAL JOIN AVOIR NATURAL JOIN COULEUR ";
            $whereCouleur = " COULEUR.nomCouleur = "+$couleur+" ";
            $conditions[] = $whereCouleur ;

        }
        if($type != null){
         $whereType = " PRODUIT.typeProduit = "+$type+" ";
         $conditions[] = $whereType ;

        }
        if($reduction != null){
         $whereReduction = " PRODUIT.reductionProduit = "+$reduction+" ";
         $conditions[] = $whereReduction ;

        }

        $sql = "SELECT * FROM `PRODUIT`"+$joinTaille+""+$joinCouleur+"WHERE "+ implode(" AND ", $conditions) +" "+ $orderTrie;
        $result = $this->conn->query($sql);

        if ($result === false) {
            return false; 
        }
        $produits = [];

        while ($row = $result->fetch_assoc()) {
            $produit = new Produit(
                $row['idProduit'],
                $row['nomProduit'],
                $row['prixProduit'],
                $row['sousTitreProduit'],
                $row['descriptionProduit'],
                $row['marqueProduit'],
                $row['reductionProduit'],
                $row['couleurProduit'],
                $row['imagesProduit'],
                $row['imageDeuxProduit']

            );
        
            $produits[] = $produit;
        }

    }

    public function getColorByProductId($id){
        $sql = "SELECT COULEUR.idCouleur,COULEUR.nomCouleur,COULEUR.hexaCouleur FROM PRODUIT NATURAL JOIN COULEUR WHERE idProduit = ".$id."";
        $result = $this->conn->query($sql);

        if ($result === false) {
            return false; 
        }

        $couleurs = [];

        while ($row = $result->fetch_assoc()) {
            $couleur = new Couleur(
                $row['idCouleur'],
                $row['nomCouleur'],
                $row['hexaCouleur']
            );
            $couleurs[] = $couleur;
        }

        return $couleurs;
    }

    public function getSizeByProductId($id){
        $sql = "SELECT TAILLE.idTaille,TAILLE.taille FROM PRODUIT NATURAL JOIN TAILLE WHERE idProduit = ".$id."";
        $result = $this->conn->query($sql);

        if ($result === false) {
            return false; 
        }

        $tailles = [];

        while ($row = $result->fetch_assoc()) {
            $taille = new Taille(
                $row['idTaille'],
                $row['taille']
            );
            $tailles[] = $taille;
        }

        return $tailles;
    }

    public function addProduit($nomProduit,$prixProduit,$descriptionProduit,$marqueProduit,$reductionProduit,$couleurProduit,$tailleProduit,$typeProduit,$imageProduit,$imageProduit2) {
        $sql = "INSERT INTO `PRODUIT`(`idProduit`, `nomProduit`, `prixProduit`, `sousTitreProduit`, `descriptionProduit`, `marqueProduit`, `reductionProduit`, `sexeProduit`, `afficherProduit`, `typeProduit`, `imageUnProduit`, `imageDeuxProduit`) VALUES (7,'$nomProduit','$prixProduit','$descriptionProduit','AAAAAA','$marqueProduit','$reductionProduit','$couleurProduit',$tailleProduit,'$typeProduit','$imageProduit','$imageProduit2')";
        $result = $this->conn->query($sql);
        

    }
    
}
?>

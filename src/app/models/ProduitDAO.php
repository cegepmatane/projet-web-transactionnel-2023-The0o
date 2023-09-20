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
            $produit = new Produit(
                $row['idProduit'],
                $row['nomProduit'],
                $row['prixProduit'],
                $row['sousTitreProduit'],
                $row['descriptionProduit'],
                $row['marqueProduit'],
                $row['reductionProduit']
            );
        
            $produits[] = $produit;
        }

        return $produits;
    }

    public function getProduitById($id){
        $sql = "SELECT * FROM PRODUIT WHERE idProduit = "+$id+"";
        $result = $this->conn->query($sql);

        if ($result === false) {
            return false; 
        }

        if ($row = $result->fetch_assoc()) {
            $produit = new Produit(
                $row['idProduit'],
                $row['nomProduit'],
                $row['prixProduit'],
                $row['sousTitreProduit'],
                $row['descriptionProduit'],
                $row['marqueProduit'],
                $row['reductionProduit']
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
            $produit = new Produit(
                $row['idProduit'],
                $row['nomProduit'],
                $row['prixProduit'],
                $row['sousTitreProduit'],
                $row['descriptionProduit'],
                $row['marqueProduit'],
                $row['reductionProduit']
            );
        
            $produits[] = $produit;
        }

        return $produits;
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
                $row['reductionProduit']
            );
        
            $produits[] = $produit;
        }

    }
}
?>

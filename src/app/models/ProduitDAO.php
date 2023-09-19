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

}
?>

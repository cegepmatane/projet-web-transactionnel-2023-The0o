<?php 
require_once('../config/database.php');
require_once('../models/Panier.php');

class PanierDAO{
    private $conn;

    public function __construct($connexion) {
        $this->conn = $connexion;
    }

    public function getListPanier($mailClient){
        $sql = "SELECT idProduit,QuantiterProduit FROM Panier WHERE mailClient = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $mailClient);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result === false) {
            return false; 
        }
    
        $listeProduit = [];
        while ($row = $result->fetch_assoc()) {
            $panier = new Panier(
                $row['idProduit'],
                $row['QuantiterProduit']
            );
            $listeProduit[] = $panier;
        }
    
        return $listeProduit;
    }

    public function deleteProduitPanier($idProduit, $emailUtilisateur){
        $sql = "DELETE FROM Panier WHERE idProduit = ? AND mailClient = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("is", $idProduit, $emailUtilisateur);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result === false) {
            return false; 
        }
    
        return true;
    }

    public function updateQuantiteProduitPanier($idProduit, $emailUtilisateur, $quantite){
        $sql = "UPDATE Panier SET QuantiterProduit = ? WHERE idProduit = ? AND mailClient = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iis", $quantite, $idProduit, $emailUtilisateur);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result === false) {
            return false; 
        }
    
        return true;
    }

    //total prix pannier 
    public function totalPricePanier($mailClient){
        $sql = "SELECT SUM(QuantiterProduit*prixProduit) AS total FROM Panier INNER JOIN Produit ON Panier.idProduit = Produit.idProduit WHERE mailClient = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $mailClient);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result === false) {
            return false; 
        }
    
        $total = $result->fetch_assoc();
    
        return $total;
    }
    


}
?>
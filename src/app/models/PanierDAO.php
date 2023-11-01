<?php 
require_once('../config/database.php');
require_once('../models/Panier.php');

class PanierDAO{
    private $conn;

    public function __construct($connexion) {
        $this->conn = $connexion;
    }

    public function getListPanier($mailClient){
        $sql = "SELECT idProduit,QuantiterProduit FROM PANIER WHERE mailClient = ?";
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
        $sql = "DELETE FROM PANIER WHERE idProduit = ? AND mailClient = ?";
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
        $sql = "UPDATE PANIER SET QuantiterProduit = ? WHERE idProduit = ? AND mailClient = ?";
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
        $sql = "SELECT SUM(QuantiterProduit*prixProduit) AS total FROM PANIER INNER JOIN PRODUIT ON PANIER.idProduit = PRODUIT.idProduit WHERE mailClient = ?";
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
    
    public function addProduitPanier($emailUtilisateur, $idProduit){
        $quantite = 1;
        $sql = "INSERT INTO PANIER (mailClient, idProduit,QuantiterProduit) VALUES (?, ?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sii", $emailUtilisateur, $idProduit, $quantite);
    
        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    }

    public function deletePanier($emailUtilisateur){
        $sql = "DELETE FROM PANIER WHERE mailClient = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $emailUtilisateur);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result === false) {
            return false; 
        }
    
        return true;
    }


}
?>

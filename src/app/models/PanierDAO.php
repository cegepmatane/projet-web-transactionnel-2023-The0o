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
    


}
?>
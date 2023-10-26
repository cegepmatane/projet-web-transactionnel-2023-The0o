<?php 
require_once('../config/database.php');

class PanierDAO{
    private $conn;

    public function __construct($connexion) {
        $this->conn = $connexion;
    }

    public function getListColor($mailClient){
        $sql = "SELECT * FROM Panier WHERE mailClient = '.$mailClient.'";
        $result = $this->conn->query($sql);

        if ($result === false) {
            return false; 
        }

        while ($row = $result->fetch_assoc()) {
            $panier = new Panier(
                $row['idProduit'],
                $row['QuantiterProduit']
            );
            $panier[] = $panier;
        }

        return $panier;
    }


}
?>
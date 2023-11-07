<?php
require_once('../config/database.php');

class CouleurDAO {
    private $conn;

    public function __construct($connexion) {
        $this->conn = $connexion;
    }

    public function getListTransaction(){
        $sql = "SELECT * FROM _TRANSACTION";
        $result = $this->conn->query($sql);

        if ($result === false) {
            return false; 
        }

        $transactions = [];

        while ($row = $result->fetch_assoc()) {
            $transaction = new Transaction(
                $row['idTransaction'],
                $row['idProduit'],
                $row['quantite'],
                $row['total']
            );
            $transactions[] = $transaction;
        }

        return $transactions;
    }

    public function getTransactionById($id){
        $sql = "SELECT * FROM _TRANSACTION idTransaction = ".$id."";
        $result = $this->conn->query($sql);

        if ($result === false) {
            return false; 
        }

        $transactions = [];

        while ($row = $result->fetch_assoc()) {
            $transaction = new Transaction(
                $row['idTransaction'],
                $row['idProduit'],
                $row['quantite'],
                $row['total']
            );
            $transactions[] = $transaction;
        }
        return $transaction;
    }


    public function addTransaction($idProduit , $quantite, $total){
        $sql = "INSERT INTO `_TRANSACTION` (`idProduit `,`quantite`, `total`) VALUES ('$idProduit ','$quantite', '$total')";
        if ($this->conn->query($sql)) {
            return true; 
        } else {
            return false;
        }
    }
}
?>
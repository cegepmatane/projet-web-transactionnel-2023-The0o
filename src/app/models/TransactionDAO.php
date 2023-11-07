<?php
require_once('../config/database.php');

class TransactionDAO {
    private $conn;

    public function __construct($connexion) {
//$mysqli = new mysqli('localhost', 'TestUserAdmin', '123', 'wirefit');
echo "o";
        $this->conn = $connexion;
//echo $connexion;
echo "n";
//echo "m".$this->conn;
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
echo "h";
        $sql = "INSERT INTO `_TRANSACTION` (`idProduit `,`quantite`, `total`) VALUES ('$idProduit ','$quantite', '$total')";
	echo "q";
	echo ".".$this->conn.".";        
echo "j";
//echo "l".$this->conn."k";
	if ($this->conn->query($sql)) {
            return true;
echo "p"; 
        } else {
echo "q";
            return false;
        }
echo "I";
    }
}
?>

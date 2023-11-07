<?php
require_once('../config/database.php');

class CouleurDAO {
    private $conn;

    public function __construct($connexion) {
        $this->conn = $connexion;
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

    public function getColorByProductId($id){
        $sql = "SELECT COULEUR.idCouleur, COULEUR.nomCouleur, COULEUR.hexaCouleur FROM PRODUIT NATURAL JOIN COULEUR WHERE idProduit = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
    
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
    


    public function addColor($nomCouleur, $hexaCouleur){
        $sql = "INSERT INTO `COULEUR` (`nomCouleur`,`hexaCouleur`) VALUES ('$nomCouleur','$hexaCouleur')";
        if ($this->conn->query($sql)) {
            return true; 
        } else {
            return false;
        }
    }

    public function deleteColor($nomCouleur) {
        $sql = "DELETE FROM `COULEUR` WHERE nomCouleur = '$nomCouleur'";
        if ($this->conn->query($sql)) {
            return true; 
        } else {
            return false;
        }
    }
}
?>
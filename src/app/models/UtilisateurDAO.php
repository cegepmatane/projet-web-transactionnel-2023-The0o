<?php
require_once('../config/database.php');

class UtilisateurDAO {
    private $conn;

    public function __construct($connexion) {
        $this->conn = $connexion;
    }


    public function createUtilisateur($nomutilisateur,$prenomutilisateur, $email, $password){
        $sql = "INSERT INTO `CLIENT` (`nomClient`,`prenomClient`,`mailClient`,`mdpClient`) VALUES ('$nomutilisateur','$prenomutilisateur','$email','$password')";
        if ($this->conn->query($sql)) {
            return true; 
        } else {
            return false;
        }
    }
}
    ?>
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

    public function getUtilisateur($email){
        $sql = "SELECT * FROM CLIENT WHERE mailClient = '$email'";
        $result = $this->conn->query($sql);

        if ($result === false) {
            return false; 
        }

        while ($row = $result->fetch_assoc()) {
            $utilisateur = new Utilisateur(
                $row['nomClient'],
                $row['prenomClient'],
                $row['mailClient'],
                'none'
            );
        }
        $utilisateur; 
        return $utilisateur;
    }
    //getPassword
    public function getPassword($email){
        $sql = "SELECT mdpClient FROM CLIENT WHERE mailClient = '$email'";
        $result = $this->conn->query($sql);

        if ($result === false) {
            return 'utilisateur non trouvé'; 
        }
        $motdepasse = '';
        while ($row = $result->fetch_assoc()) {
            $motdepasse = $row['mdpClient'];
        }

        return $motdepasse;
    }



}
    ?>
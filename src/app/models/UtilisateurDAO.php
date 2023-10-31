<?php
require_once('../config/database.php');

class UtilisateurDAO {
    private $conn;

    public function __construct($connexion) {
        $this->conn = $connexion;
    }

    public function createUtilisateur($nomutilisateur, $prenomutilisateur, $email, $password){
        $sql = "INSERT INTO CLIENT (nomClient, prenomClient, mailClient, mdpClient) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $nomutilisateur, $prenomutilisateur, $email, $password);
    
        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    }
    
    public function getUtilisateur($email){
        $sql = "SELECT * FROM CLIENT WHERE mailClient = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result === false) {
            return false; 
        }
    
        $utilisateur = null;
        while ($row = $result->fetch_assoc()) {
            $utilisateur = new Utilisateur(
                $row['nomClient'],
                $row['prenomClient'],
                $row['mailClient'],
                'none'
            );
        }
        return $utilisateur;
    }
    
    public function getPassword($email){
        $sql = "SELECT mdpClient FROM CLIENT WHERE mailClient = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result === false) {
            return 'utilisateur non trouvé'; 
        }
        $motdepasse = '';
        while ($row = $result->fetch_assoc()) {
            $motdepasse = $row['mdpClient'];
        }
        return $motdepasse;
    }
    

 
    public function updatePassword($email, $password){
        $sql = "UPDATE CLIENT SET mdpClient = ? WHERE mailClient = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $password, $email);
    
        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    }
    
    public function updateUtilisateur($email, $nom, $prenom, $adresse){
        $sql = "UPDATE CLIENT SET nomClient = ?, prenomClient = ?, adresseClient = ?, mailClient = ? WHERE mailClient = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssss", $nom, $prenom, $adresse, $email, $email);
    
        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    }
    
    public function allUtilisateur() {
        $sql = "SELECT * FROM CLIENT";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result === false) {
            return 'Aucun utilisateur trouvé';
        }
    
        $utilisateurs = array(); // Initialiser un tableau vide pour stocker les utilisateurs
    
        while ($row = $result->fetch_assoc()) {
            $utilisateur = new Utilisateur(
                $row['nomClient'],
                $row['prenomClient'],
                $row['mailClient'],
                'none'
            );
    
            // Ajouter l'utilisateur au tableau
            $utilisateurs[] = $utilisateur;
        }
    
        return $utilisateurs;
    }
    

}
?>
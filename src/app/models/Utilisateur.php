<?php 
class Utilisateur{
    private $nomutilisateur;
    private $prenomutilisateur;
    private $email;
    private $password;
    private $adresse;

    public function __construct( $nomutilisateur,$prenomutilisateur, $email, $password) {
        $this->nomutilisateur = filter_var($nomutilisateur, FILTER_SANITIZE_STRING);
        $this->prenomutilisateur = filter_var($prenomutilisateur, FILTER_SANITIZE_STRING);        
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->password = $password;
    }

    public function __construct2( $nomutilisateur,$prenomutilisateur, $email, $password, $adresse) {
        $this->nomutilisateur = filter_var($nomutilisateur, FILTER_SANITIZE_STRING);
        $this->prenomutilisateur = filter_var($prenomutilisateur, FILTER_SANITIZE_STRING);        
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->password = $password;
        $this->adresse = $adresse;
    }
    

    public function getEmail() {
        return $this->email;
    }

    public function getPrenom() {
        return $this->prenomutilisateur;
    }

    public function getNom() {
        return $this->nomutilisateur;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setEmail($email) {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    public function setPrenom($prenom) {
        $this->prenomutilisateur = filter_var($prenom, FILTER_SANITIZE_STRING);
    }

    public function setNom($nom) {
        $this->nomutilisateur = filter_var($nom, FILTER_SANITIZE_STRING);
    }

    public function setAdresse($adresse) {
        $this->adresse = filter_var($adresse, FILTER_SANITIZE_STRING);
    }
}
?>
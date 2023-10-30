<?php 
class Utilisateur{
    private $nomutilisateur;
    private $prenomutilisateur;
    private $email;
    private $password;

    public function __construct( $nomutilisateur,$prenomutilisateur, $email, $password) {
        $this->nomutilisateur = filter_var($nomutilisateur, FILTER_SANITIZE_STRING);
        $this->prenomutilisateur = filter_var($prenomutilisateur, FILTER_SANITIZE_STRING);        
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->password = $password;
    }

    public function getEmail() {
        return $this->email;
    }

}
?>
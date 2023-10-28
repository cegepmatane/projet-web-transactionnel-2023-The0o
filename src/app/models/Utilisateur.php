<?php 
class Utilisateur{
    private $id;
    private $nomutilisateur;
    private $prenomutilisateur;
    private $email;
    private $password;

    public function __construct($id, $nomutilisateur,$prenomutilisateur, $email, $password) {
        $this->id = filter_var($id, FILTER_VALIDATE_INT);
        $this->nomutilisateur = filter_list($nomutilisateur, FILTER_SANITIZE_STRING);
        $this->prenomutilisateur = filter_var($prenomutilisateur, FILTER_SANITIZE_STRING);        
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->password = $password;
    }
}
?>
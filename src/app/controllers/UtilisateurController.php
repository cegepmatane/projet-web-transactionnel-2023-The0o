<?php 
require_once('../models/Utilisateur.php');
require_once('../models/UtilisateurDAO.php');

class UtilisateurController{
    private $utilisateurDAO;

    public function __construct($connexion) {
        $this->utilisateurDAO = new UtilisateurDAO($connexion);
    }

    public function creeUtilisateur($nomutilisateur,$prenomutilisateur, $email, $password){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $confirmationCreation = $this->utilisateurDAO->createUtilisateur($nomutilisateur,$prenomutilisateur, $email, $password);
        return $confirmationCreation;
    }
}
?>
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

    public function connexionUtilisateur($email, $password){
        $utilisateur = $this->utilisateurDAO->getUtilisateur($email);
        if ($utilisateur === false) {
            return false;
        }else{
            $motdepasse = $this->utilisateurDAO->getPassword($email);
            if (password_verify($password, $motdepasse)) {
                return $utilisateur;
            } else {
                return false;
            }
        }
       
    }
}
?>
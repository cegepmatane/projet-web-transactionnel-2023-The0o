<?php
class Client {
    public $mailClient;
    public $prenomClient;
    public $mdpClient;
    public $nomClient;
    public $adresseClient;

    public function __construct($mail, $prenom, $mdp, $nom, $adresse) {
        $this->mailClient = filter_var($mail, FILTER_SANITIZE_EMAIL);
        $this->prenomClient = htmlspecialchars($prenom);
        $this->mdpClient = $mdp;
        $this->nomClient = htmlspecialchars($nom);
        $this->adresseClient = $adresse;
    }
}
?>
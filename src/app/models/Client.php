<?php
class Client {
    public $mailClient;
    public $prenomClient;
    public $mdpClient;
    public $nomClient;
    public $adresseClient;

    public function __construct($mail, $prenom, $mdp, $nom, $adresse) {
        $this->mailClient = filter_var($mail, FILTER_SANITIZE_EMAIL);
        $this->prenomClient = filter_var($prenom, FILTER_SANITIZE_STRING);
        $this->mdpClient = $mdp;
        $this->nomClient = filter_var($nom, FILTER_SANITIZE_STRING);
        $this->adresseClient = $adresse;
    }
}
?>
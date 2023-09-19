<?php
class Client {
    public $mailClient;
    public $prenomClient;
    public $mdpClient;
    public $nomClient;
    public $adresseClient;

    public function __construct($mail, $prenom, $mdp, $nom, $adresse) {
        $this->mailClient = $mail;
        $this->prenomClient = $prenom;
        $this->mdpClient = $mdp;
        $this->nomClient = $nom;
        $this->adresseClient = $adresse;
    }
}
?>
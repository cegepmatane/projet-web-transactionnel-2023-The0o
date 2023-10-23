<?php
class Couleur {
    public $idCouleur;
    public $nomCouleur;
    public $hexaCouleur;

    public function __construct($id, $nom, $hexa) {
        $this->idCouleur = filter_var($id, FILTER_VALIDATE_INT);
        $this->nomCouleur = filter_var($nom, FILTER_SANITIZE_STRING);
        $this->hexaCouleur = filter_var($hexa, FILTER_SANITIZE_STRING);
    }
}
?>
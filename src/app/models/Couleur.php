<?php
class Couleur {
    public $idCouleur;
    public $nomCouleur;

    public function __construct($id, $nom) {
        $this->idCouleur = $id;
        $this->nomCouleur = $nom;
    }
}
?>
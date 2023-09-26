<?php
class Couleur {
    public $idCouleur;
    public $nomCouleur;
    public $hexaCouleur;

    public function __construct($id, $nom, $hexa) {
        $this->idCouleur = $id;
        $this->nomCouleur = $nom;
        $this->hexaCouleur = $hexa;
    }
}
?>
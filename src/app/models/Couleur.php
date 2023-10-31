<?php
class Couleur {
    public $idCouleur;
    public $nomCouleur;
    public $hexaCouleur;

    public function __construct($id, $nom, $hexa) {
        $this->idCouleur = filter_var($id, FILTER_VALIDATE_INT);
        $this->nomCouleur = htmlspecialchars($nom);
        $this->hexaCouleur = htmlspecialchars($hexa);
    }
}
?>
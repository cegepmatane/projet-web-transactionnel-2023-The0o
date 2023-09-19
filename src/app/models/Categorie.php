<?php 
class Categorie {
    public $idCategorie;
    public $nomCategorie;

    public function __construct($id, $nom) {
        $this->idCategorie = $id;
        $this->nomCategorie = $nom;
    }
}

?>
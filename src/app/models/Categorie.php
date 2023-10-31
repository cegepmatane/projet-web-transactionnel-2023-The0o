<?php 
class Categorie {
    public $idCategorie;
    public $nomCategorie;

    public function __construct($id, $nom) {
        $this->idCategorie = filter_var($id, FILTER_VALIDATE_INT);
        $this->nomCategorie = htmlspecialchars($nom);
    }
}

?>
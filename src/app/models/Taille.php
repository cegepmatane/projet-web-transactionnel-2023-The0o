<?php
class Taille {
    public $idTaille;
    public $taille;

    public function __construct($id, $taille) {
        $this->idTaille = $id;
        $this->taille = $taille;
    }
}

?>
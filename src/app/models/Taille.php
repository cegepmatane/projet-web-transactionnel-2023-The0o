<?php
class Taille {
    public $idTaille;
    public $taille;

    public function __construct($id, $taille) {
        $this->idTaille = filter_var($id, FILTER_VALIDATE_INT);
        $this->taille = $taille;
       
       
    }
}
?>
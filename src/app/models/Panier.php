<?php 
class Panier{

        public $idProduit;
        public $QuantiterProduit;
    
        public function __construct($quantiter, $idProduit) {
            $this->idProduit = filter_var($idProduit, FILTER_VALIDATE_INT);
            $this->QuantiterProduit = filter_var($quantiter, FILTER_SANITIZE_STRING);
        }
    }
?>
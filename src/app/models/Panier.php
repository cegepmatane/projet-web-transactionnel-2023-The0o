<?php 
class Panier{

        public $idProduit;
        public $QuantiterProduit;
    
        public function __construct($idProduit,$quantiter ) {
            $this->idProduit = htmlspecialchars($idProduit);
            $this->QuantiterProduit = htmlspecialchars($quantiter);
        }
    }
?>
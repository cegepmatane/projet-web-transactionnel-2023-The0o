<?php 
class Transaction {
    public $idTransaction;
    public $idProduit;
    public $quantite;
    public $total;

    public function __construct($id, $idProduit, $quantite, $total) {
        $this->idTransaction = filter_var($id, FILTER_VALIDATE_INT);
        $this->idProduit = htmlspecialchars(explode(",", $idProduit));
        $this->quantite = htmlspecialchars(explode(",", $quantite));
        $this->total = filter_var($total, FILTER_VALIDATE_INT);
    }
}

?>
<?php

require_once('../models/PanierDAO.php');
require_once('../controllers/PanierController.php');
require_once('../config/database.php');
require_once('../config/config.php');
require_once('../controllers/ProduitController.php');
require_once('../models/Utilisateur.php');

use Stripe\Checkout\Session;
use Stripe\Stripe;
require '../../../vendor/autoload.php';

class StripePayment {

    public function __construct(readonly private string $cle) {
        Stripe::setApiKey($this->cle);
    }

    public function startPayment() {
	$mysqli = new mysqli('localhost', 'TestUserAdmin', '123', 'wirefit');
	$panierDAO = new PanierController($mysqli);
	$produitDAO = new ProduitController($mysqli);
	session_start();
	$utilisateurObjet = $_SESSION['utilisateur'];
	$emailUtilisateur = $utilisateurObjet->getEmail();
	$panierDAO->ListPanierProduit($emailUtilisateur);
	$arrayy = array();
	foreach ($panierDAO->ListPanierProduit($emailUtilisateur) as &$value) {
		$produit = $produitDAO->afficherUnProduitParSonId($value->idProduit);
		array_push($arrayy, array('quantite' => $value->QuantiterProduit, 'prix' => $produit->prixProduit, 'nomProduit' => $produit->nomProduit));
	}
	$line_items = array_map(function(array $product) {
	    return [
        	'quantity'   => $product['quantite'],
        	'price_data' => [
            	'currency'     => 'EUR',
            	'product_data' => [
                	'name' => $product['nomProduit']
            	],
            	'unit_amount'  => $product['prix']*100
        	]
    	];
	}, $arrayy);
	$session = Session::create([
		'line_items'                  => $line_items, 
	        'mode'                        => 'payment',
            	'success_url'                 => 'http://localhost/poc/src/success.html', //a changer manuellement
            	'cancel_url'                  => 'http://localhost/poc/src/stripe.html', //a changer manuellement
            	'billing_address_collection'  => 'required',
            	'shipping_address_collection' => [
                'allowed_countries' => ['CA', 'FR']
            ]
        ]);
        header("HTTP/1.1 303 See Other");
        header("Location: " . $session->url);
    }

}
?>
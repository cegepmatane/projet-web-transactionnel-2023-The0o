<?php

use Stripe\Checkout\Session;
use Stripe\Stripe;
require '../vendor/autoload.php';

class StripePayment {

    public function __construct(readonly private string $cle) {
        Stripe::setApiKey($this->cle);
    }

    public function startPayment() {
        $session = Session::create([
            'line_items'                  => [[
                    'quantity'   => 1,
                    'price_data' => [
                        'currency'     => 'EUR',
                        'product_data' => [
                            'name' => 'Pantalon'
                        ],
                        'unit_amount'  => 250
                    ]
                ]
            ],
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
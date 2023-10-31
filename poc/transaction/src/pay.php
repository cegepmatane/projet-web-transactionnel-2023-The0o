<?php
require 'StripePayment.php';
$payment = new StripePayment('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');
$payment->startPayment();
?>
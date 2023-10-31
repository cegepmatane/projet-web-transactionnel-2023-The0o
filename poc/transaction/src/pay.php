<?php
require 'StripePayment.php';
$payment = new StripePayment('sk_test_51O71hxG0rXHdvczpljKbKUsyzf4Mf9EYanrbxqj2SUENDhQyI1f9Y9ZzdQO6ra6f807grD67pb4sPlUC2i1d5srN00YEk21P8u');
$payment->startPayment();
?>
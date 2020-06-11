<?php
require('../../models/Ticket_model.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$products = array();
$amounts = array();
$price = array();
$totalPrice= 0;

foreach( $_SESSION["ticketsCart"] as $cart)
{
    $products[] = $cart->ticketName;
    $price[]=$cart->ticketPrice;
    $amounts[]=$cart->ticketAmount;

//        print_r($products);
//        print_r($price);
//        print_r($amounts);
}
for ($i=0; $i< count($products); $i++) {
    $totalPrice = $totalPrice + ($price[$i] * $amounts[$i]);
}
print_r($totalPrice);
$totalPrice=number_format($totalPrice, 2);
/*
 * Make sure to disable the display of errors in production code!
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ("mollie/vendor/autoload.php");
require_once ("mollie/examples/functions.php");
/*
 * Initialize the Mollie API library with your API key.
 *
 * See: https://www.mollie.com/dashboard/developers/api-keys
 */
$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey("test_d3AV4wgJvxWVuUHMMrFrMvuy9vzjxw");

// print_r($mollie);

$payment = $mollie->payments->create([
    "amount" => [
        "currency" => "EUR",
        "value" => $totalPrice


    ],
    "description" => "hfa3-united",
    "redirectUrl" => "http://hfa3.infhaarlem.nl/PHPGroep3/public/payment-inf2b/redirect.php",
    "webhookUrl"  => "http://hfa3.infhaarlem.nl/PHPGroep3/public/payment-inf2b/webhook.php",
]);

header("Location: " . $payment->getCheckoutUrl(), true, 303);
?>
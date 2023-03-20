<?php

require('config.php');
require('razorpay-php/Razorpay.php');
session_start();

// Create the Razorpay Order
$price=$_SESSION['total'];

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    'receipt'         => 3456,
    'amount'          => $price * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$checkout = 'automatic';

if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
{
    $checkout = $_GET['checkout'];
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => "Therm-on",
    "description"       => "Grocery store",
    "image"             => "https://thermon.trendywardrobe.store/img/pay_img.jpeg",
    "prefill"           => [
    "name"              => "",
    "email"             => "",
    "contact"           => "",
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);

require("checkout/{$checkout}.php");
?>
<html>
    <head>
        <style>
            *{margin: 0px;padding: 0px;}
            body{padding: 0px;margin: 0px;background-image: url('back.webp');background-size: cover;}
            input{position: fixed;top:48%;left:43%;border-radius: 5px;
  font-size: 20px;
  padding: 14px 80px;
  cursor: pointer;
  color: #fff;
  background-color: #00A6FF;
  font-size: 1.5rem;
  font-family: 'Roboto';
  font-weight: 100;
  border: 1px solid #fff;
  box-shadow: 2px 2px 5px #AFE9FF;
  transition-duration: 0.5s;
  -webkit-transition-duration: 0.5s;
  -moz-transition-duration: 0.5s;}
  input:hover{ color: #006398;
  border: 1px solid #006398;
  box-shadow: 2px 2px 20px #AFE9FF;}
            </style>
    </head>
    <body>
    </body>
</html>
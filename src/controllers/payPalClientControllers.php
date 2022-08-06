<?php
require '../vendor/autoload.php';
require '../src/model/PayPalClient.php';
require '../src/model/Cart.php';

use App\Model\Cart\Cart;
use PayPalHttp\HttpException;
use App\Lib\Database\DatabaseConnection;
use App\Model\PayPalClient\PayPalClient;


session_start();
$CartRepository = new Cart();
$CartRepository->connection = new DatabaseConnection();
// echo 'stripe';
$CartRepository->setcin($_SESSION['cin']);

$client = PayPalClient::client();

$succesURL = $router->url('succesPaypement');
// Construct a request object and set desired parameters
// Here, OrdersCreateRequest() creates a POST request to /v2/checkout/orders
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
$request = new OrdersCreateRequest();
$request->prefer('return=representation');

$request->body = [
    "intent" => "CAPTURE",
    "purchase_units" => [[
        "reference_id" => $CartRepository->getcin(),
        "amount" => [
            "value" => $CartRepository->getTotal()/10,
            "currency_code" => "EUR"
        ]
    ]],
    "application_context" => [
         "cancel_url" => "http://localhost:8080/cancel.php",
         "return_url" => "http://localhost:8080/panier/payment/succesPayment"
    ] 
];
// dd($request);

try {
    // Call API with your client and get a response for your call
    $response = $client->execute($request);
    // dd($response);
    // If call returns body in response, you can get the deserialized version from the result attribute of the response
    print_r($response);
    
    $_SESSION["paypal_order_id"] = strval($response->result->id );
    // dd($_SESSION);
    foreach ($response->result->links as $link){
        if ($link->rel == "approve")
            header('location:'.$link->href);
    }
}catch (HttpException $ex) {
    echo $ex->statusCode;
    print_r($ex->getMessage());
}
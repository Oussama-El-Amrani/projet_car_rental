<?php
require '../vendor/autoload.php';
require '../src/model/Cart.php';
require '../src/model/PayPalClient.php';

use PayPalHttp\HttpException;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use App\Model\Cart\Cart;
use App\Lib\Database\DatabaseConnection;
use Nyholm\Psr7\Response;
use App\Model\PayPalClient\PayPalClient;

session_start();
$client = PayPalClient::client();
$request = new OrdersCaptureRequest($_SESSION["paypal_order_id"]);
$request->prefer('return=representation');
// dd($request);
try {
    // Call API with your client and get a response for your call
    // dd($client->execute($request));
    $response = $client->execute($request);
    // dd($response);
    // dd($_SESSION);
    // If call returns body in response, you can get the deserialized version from the result attribute of the response
    // print_r($response);

    $CartRepository = new Cart();
    $CartRepository->connection = new DatabaseConnection();
    // dd($CartRepository);
    // dd($_SESSION);
    $CartRepository->setcin($_SESSION['cin']);
    // dd($CartRepository);
    $CartRepository->paymentSuccess();
    // dd($CartRepository);

    // echo 'ok';
}catch (HttpException $ex) {
    echo $ex->statusCode;
    print_r($ex->getMessage());
}
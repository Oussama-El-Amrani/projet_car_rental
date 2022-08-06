<?php

use App\Lib\Database\DatabaseConnection;
use App\Model\Cart\Cart;
use App\Model\PaypalPayment\PaypalPayment;

require '../vendor/autoload.php';
require '../src/lib/database.php';
require '../src/model/Cart.php';
require '../src/model/PaypalPayment.php';

define('PAYPAL_ID' ,'AZcP5NMIfn5ddSPV7eI_bE70hTbS48Cq1J5Fsii7weXdnHHXsiX6hJaRSUvowMyG4Vs-hIGhSMEIDXgf');
define('PAYPAL_SECRET' ,'EPr9qCReiCR3K22AAQH3oW_dAj8xxp3-04gsMP2UTNR6ep04pJ1a58jyq-H0bkGwCkZWXb45xgI_m3Gv');

session_start();
$CartRepository = new Cart();
$CartRepository->connection = new DatabaseConnection();
$CartRepository->setcin($_SESSION['cin']);
// dd($params['id']);
$CartRepository->setId($params['id']);

$payment = new PaypalPayment(PAYPAL_ID, PAYPAL_SECRET, true);

if((isset($_GET['check_in']) && !empty($_GET['check_in'])) && (isset($_GET['check_out']) && !empty($_GET['check_out'])))
{
    $CartRepository->setCheck_in($_GET['check_in']);
    $CartRepository->setCheck_out($_GET['check_out']);
    // dd($CartRepository);
    $CartRepository->setPrice();
    $CartRepository->addToCart();
    // dd($router->url('panier'));
    // $router->url('panier');
}

header('location:'.$router->url('panier'));

// $cars = $CartRepository->findCarsRental($_SESSION['cin']);
// dd($cars);


// dd($payment);
// require '../templates/cartpage.php';


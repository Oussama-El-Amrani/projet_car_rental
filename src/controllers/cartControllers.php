<?php

use App\Lib\Database\DatabaseConnection;
use App\Model\Cart\Cart;
use App\Model\PaypalPayment\PaypalPayment;

require '../vendor/autoload.php';
require '../src/lib/database.php';
require '../src/model/Cart.php';
require '../src/model/PaypalPayment.php';


session_start();
$CartRepository = new Cart();
$CartRepository->connection = new DatabaseConnection();
$CartRepository->setcin($_SESSION['cin']);

$CartRepository->setId($params['id']);

if((isset($_GET['check_in']) && !empty($_GET['check_in'])) && (isset($_GET['check_out']) && !empty($_GET['check_out'])))
{
    $CartRepository->setCheck_in($_GET['check_in']);
    $CartRepository->setCheck_out($_GET['check_out']);

    $CartRepository->setPrice();
    $CartRepository->addToCart();
}

header('location:'.$router->url('panier'));

// $cars = $CartRepository->findCarsRental($_SESSION['cin']);
// dd($cars);


// dd($payment);
// require '../templates/cartpage.php';


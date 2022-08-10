<?php

use App\Lib\Database\DatabaseConnection;
use App\Model\Cart\Cart;

require '../vendor/autoload.php';
require '../src/lib/database.php';
require '../src/model/Cart.php';

session_start();
$CartRepository = new Cart();
$CartRepository->connection = new DatabaseConnection();
// dd($_SESSION);
$CartRepository->setcin($_SESSION['cin']);

$cars = $CartRepository->findCarsRentalOfUser($_SESSION['cin']);
// dd($cars);
require '../templates/panierpage.php';
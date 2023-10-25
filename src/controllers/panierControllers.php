<?php

use App\Lib\Database\DatabaseConnection;
use App\Model\Cart\Cart;

require '../vendor/autoload.php';
require '../src/lib/database.php';
require '../src/model/Cart.php';

session_start();
$CartRepository = new Cart();
$CartRepository->connection = new DatabaseConnection();

$CartRepository->setcin($_SESSION['cin']);

$cars = $CartRepository->findCarsRentalOfUser($_SESSION['cin']);

require '../templates/panierpage.php';
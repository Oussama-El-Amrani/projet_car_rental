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


$rentalCarsInfo = $CartRepository->findCarsRentalOfAllUser();
// dd($cars);
require '../templates/admin/rentalCarsInfoPage.php';
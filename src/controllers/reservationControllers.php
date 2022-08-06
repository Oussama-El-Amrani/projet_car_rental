<?php

use App\Lib\Database\DatabaseConnection;
use App\Model\Cars\Car;
use App\Model\Cart\Cart;

require '../vendor/autoload.php';
require '../src/lib/database.php';
require '../src/model/Cars.php';
require '../src/model/Cart.php';

$carRepository = new Car();
$carRepository->connection = new DatabaseConnection();
// dd($params);
$car = $carRepository->getCar($params['id']);
// dd($car);

require '../templates/reservation.php';

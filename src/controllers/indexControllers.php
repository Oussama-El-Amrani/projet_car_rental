<?php
require '../vendor/autoload.php';
require ('../src/lib/database.php');
require '../src/model/Cars.php';

use App\Lib\Database\DatabaseConnection;
use App\Model\Cars\Car;

$carsRepository = new Car();
$carsRepository->connection = new DatabaseConnection();
$pictures = $carsRepository->getCar_pictures();

require '../templates/indexpage.php';
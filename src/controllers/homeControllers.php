<?php

require '../vendor/autoload.php';
require ('../src/lib/database.php');
require '../src/model/CarsRepository.php';
require '../src/model/Authentification.php';

use App\Lib\Database\DatabaseConnection;
use App\Model\CarsRepository\CarsRepository;

use App\Model\Authentication\Authentication;

// dd($_SESSION);
Authentication::check();

$carsRepository = new CarsRepository;
$carsRepository->connection = new DatabaseConnection();
$cars = $carsRepository->getCars();
// dd($cars);

$car_picture_Dir = dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'imgs' . DIRECTORY_SEPARATOR . 'cars_picture' . DIRECTORY_SEPARATOR;
// dd($car_picture_Dir);
require '../templates/homepage.php';

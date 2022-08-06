<?php

require '../vendor/autoload.php';
require ('../src/lib/database.php');
require '../src/model/CarsRepository.php';
require '../src/model/Authentification.php';

use App\Lib\Database\DatabaseConnection;
use App\Model\CarsRepository\CarsRepository;
use App\Model\Authentication\Authentication;

// dd($_SESSION);
Authentication::checkAdmin();


$carRepository = new CarsRepository();
$carRepository->connection = new DatabaseConnection();
$cars = $carRepository->getCars();


require '../templates/admin/adminpage.php';



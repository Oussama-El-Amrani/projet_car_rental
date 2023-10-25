<?php

require '../vendor/autoload.php';
require ('../src/lib/database.php');
require '../src/model/CarsRepository.php';
require '../src/model/Authentification.php';

use App\Lib\Database\DatabaseConnection;
use App\Model\CarsRepository\CarsRepository;
use App\Model\Authentication\Authentication;

Authentication::checkAdmin();


$carRepository = new CarsRepository();
$carRepository->connection = new DatabaseConnection();
$cars = $carRepository->getCarsForAdmin();

require '../templates/admin/adminpage.php';



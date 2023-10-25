<?php
use App\Lib\Database\DatabaseConnection;
use App\Model\Cars\Car;


require '../vendor/autoload.php';
require '../src/lib/database.php';
require '../src/model/Cars.php';
// require '../src/modele/Authentification.php';

// Authentication::checkAdmin();

$CarRepository = new Car();
$CarRepository->connection = new DatabaseConnection();
$delete = $CarRepository->deleteCar($params['id']);
header('Location: ' . $router->url('admin_posts') . '?delete=1');

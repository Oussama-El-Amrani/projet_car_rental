<?php

use App\Lib\Database\DatabaseConnection;
use App\Model\Cars\Car;
use Valitron\Validator;
// use App\Model\Authentication\Authentication;

require '../vendor/autoload.php';
require '../src/lib/database.php';
require '../src/model/Cars.php';
// require '../src/modele/Authentification.php';
// dd($_SESSION);
// Authentication::checkAdmin();

$CarRepository = new Car();
$CarRepository->connection = new DatabaseConnection();
$car = $CarRepository->getCar($params['id']);

$success = false;

$errors = [];

if(!empty($_POST)){
    // Validator::lang('fr');
    // $v = new Validator($_POST);
    // $v->labels(array(
    //     'name' => 'modele'
    // ));
    // $v->rule('required','modele');
    // if($v->validate()) {
        // dd($_POST);
        $car->setId($params['id']);
        $car->setModele($_POST['modele']);
        $car->setDaily_price($_POST['daily_price']);
        $car->setMarque($_POST['marque']);
        $car->setAvailable($_POST['available']);
        // dd($_FILES);
        if($_FILES['car_picture']['name']!==""){
            // dd($_FILES['car_picture']['name']);
            // $car->setCar_picture($_FILES);
        }
        
        
        // dd($_FILES);
        $CarRepository->update();
        $success = true;
    // } else {
    //     $errors = $v->errors();
    // }
}
require '../templates/admin/editpage.php';


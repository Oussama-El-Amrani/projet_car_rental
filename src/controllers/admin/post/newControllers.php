<?php

use App\Lib\Database\DatabaseConnection;
use App\Model\Cars\Car;
use Valitron\Validator;

require '../vendor/autoload.php';
require '../src/lib/database.php';
require '../src/model/Cars.php';

$car = new Car();
$car->connection = new DatabaseConnection();

$success = false;

$errors = [];

if(!empty($_POST)){
    Validator::lang('fr');
    $v = new Validator($_POST);
    $v->labels(array(
        'name' => 'modele'
    ));
    $v->rule('required','modele');
    if($v->validate()) {
        $car->setId($_POST['id']);
        $car->setModele($_POST['modele']);
        $car->setDaily_price($_POST['daily_price']);
        $car->setMarque($_POST['marque']);
        $car->setAvailable($_POST['available']);
        $car->setCar_picture($_FILES);
        // dd($_POST);
        $car->newCar();
        $success = true;
    } else {
        $errors = $v->errors();
    }
}

require '../templates/admin/newpage.php';

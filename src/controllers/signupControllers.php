<?php

use App\HTML\Form;
use App\Lib\Database\DatabaseConnection;
use App\Model\User\User;

require '../vendor/autoload.php';
require '../src/lib/database.php';
require '../src/model/User.php';

$user = new User();
$user->connection = new DatabaseConnection();

$form = new Form();

$errors = [];
if((isset($_POST['cin']) && !empty($_POST['cin'])) && (isset($_POST['first_name']) && !empty($_POST['first_name'])) && (isset($_POST['last_name']) && !empty($_POST['last_name'])) && (isset($_POST['city']) && !empty($_POST['city'])) && (isset($_POST['phone_num']) && !empty($_POST['phone_num'])) && (isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password'])) && (isset($_FILES) && !empty($_FILES))){
    $user->setCin($_POST['cin']);
    $user->setFirst_name($_POST['first_name']);
    $user->setLast_name($_POST['last_name']);
    $user->setCity($_POST['city']);
    $user->setPhone_num($_POST['phone_num']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->setUser_picture($_FILES);

    $ok = $user->addUser();
    if($ok){
        header('Location: ' . $router->url('login'));
        exit();
    }
    if(!$ok){
        dd($ok);
        require '../templates/signup.php';
    }
}

require '../templates/signup.php';
